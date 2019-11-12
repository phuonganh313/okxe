<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Payment;
use App\Install;
use App\Http\Requests;
use DateTime;

class AdminController extends Controller
{
    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function index(){
        return view('admin.user');
    }

    public function getList(Request $request){
        $data = $this->userModel->filter($request);

        return response()->json(array(
            "draw"            => (int) $request['draw'] ,
            "recordsTotal"    => (int)  $data['totalAmount'] ,
            "recordsFiltered" => (int)  $data['totalFiltered'] ,
            "data"            => AdminController::renderList($data['users'])
        ));
    }

    private static function renderList($users){
        $list_user = [];
        if($users){
            foreach($users as $user)
            {
                array_push($list_user,
                    [
                        'id' => $user->id,
                        'name'=> $user->name,
                        'email'=> $user->email,
                        'phone'=> $user->phone,
                        'facebook_name'=> $user->facebook_name,
                        'facebook_url'=> $user->facebook_url,
                        'threshold'=> number_format($user->threshold),
                        'bank_name'=> $user->bank_name,
                        'bank_branch'=> $user->bank_branch,
                        'beneficiary_account'=> $user->beneficiary_account,
                        'beneficiary_name'=> $user->beneficiary_name,
                        'price'=> number_format($user->price),
                        'created_at'=> $user->created_at ? $user->created_at->format('m/d/Y H:i') : "",
                    ]
                );

            }

        }
        return $list_user;
    }

    public function reportUser(){
        $users = User::all();
        foreach($users as $key=>$user){
            $users[$key]['quantity_item'] = Item::countItemByIdUser($user->id);
            $users[$key]['amount'] = Item::getAmountByIdUser($user->id);
            $users[$key]['paid'] = Payment::getAmountByIdUser($user->id);
            $users[$key]['amount_due'] = $amount_due =  (float)Item::getAmountByIdUser($user->id) - (float)Payment::getAmountByIdUser($user->id);
            $users[$key]['action'] = (($amount_due - $user['threshold']) > 0) ? 1 : 0;
        }
        return view('admin.report', compact('users'));
    }

    public function getDetailUser(Request $request){
        if(Auth::user()->id == $request->id || Auth::user()->id_role == 1){
            $user = User::find($request->id);
            $items = Item::getItemByIdUser($request->id);
            $payments = Payment::getAmountByIdUserAndByCreatedAt($request->id);
            foreach($items as $key=>$item){
                $items[$key]['paid'] = 0;
                $items[$key]['bonus'] = 0;
                $date=date_create($item['day']);
                date_add($date,date_interval_create_from_date_string("1 days"));
                $created_at = date_format($date,"Y-m-d");
                if($payments){
                    foreach($payments as $val){
                        if($item['day'] == $val['day']){
                            $items[$key]['paid'] = $val['amount'] ? $val['amount'] : 0;
                            $items[$key]['bonus'] = $val['bonus'] ? $val['bonus'] : 0;
                        }
                        $items[$key]['return'] = Item::getCostByDate($request->id, $created_at) - Payment::getCostByDate($request->id, $created_at);
                    }
                }else{
                    $items[$key]['return'] = Item::getCostByDate($request->id, $created_at);
                }
            }
            return view('admin.reportdetail', compact('items','user'));
        }
        echo 'Something went wrong.';
    }

    public function addUser(){
        $permission = $this->userModel->permission;
        return view('admin.adduser', compact('permission'));
    }

    public function saveUser(Request $request){
        $this->validate($request, 
        ['name' => 'required',
        'email' => 'required|email|unique:users,email',
        'threshold' => 'required',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',]
        );
        $user = Auth::user();
        $user->create([
            'name' => $request->name,
            'email' => $request->email,    
            'status' => $request->status,
            'phone' => $request->phone,
            'facebook_name' => $request->facebook_name,
            'facebook_url' => $request->facebook_url,
            'threshold' => $request->threshold,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'beneficiary_account' => $request->beneficiary_account,
            'beneficiary_name' => $request->beneficiary_name,
            'price'=> $request->price,
            'password' => bcrypt($request->password),
            'id_role' => $request->id_role,
        ]);
        return redirect()->action('AdminController@index');
    }

    public function install(){
        $install = new Install();
        $install->install();
    }

    public function listPayment(){
        $payments = Payment::all();
        return view('admin.listpayment', compact('payments'));
    }

    public function addPayment(Request $request){
        $users = User::all();
        $payment = [];
        $payment = $request->id ? Payment::find($request->id) : $payment;
        return view('admin.addpayment',compact('users','payment'));
    }

    public function save(Request $request){
        $all_request = $request->all();
        if(!$request->id){
            $this->validate($request, [
                'amount' =>  'required',
            ]
        );}
        $price =  str_replace(',', '', $all_request['amount']);
        $all_request['amount'] =  floatval(str_replace('.', '', $price));
        if($request->id){
            $payment = Payment::find($request->id);
            $payment->update($all_request);
        }else{
            $payment = new Payment();
            $payment->create($all_request);
        }
        return redirect()->action('AdminController@listPayment');
    }
}
