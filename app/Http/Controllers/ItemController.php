<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\ItemRequest;
use App\Brand;
use App\Models;
use App\County;
use App\Item;
use App\Image;
use App\User;
use Validator;
use File;
use Carbon\Carbon;
class ItemController extends Controller
{
    private $item;

    public function __construct(){
        $this->item = new Item();
        $this->image = new Image();
    }

    public function index(){
        $users = User::all();
        $id_user = '';
        if(Auth::user()->id_role == 1){
            return view('admin.listitemadmin', compact('users','id_user'));
        }else{
            return view('admin.listitem', compact('users','id_user'));
        }
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getList(Request $request){
        $data = $this->item->filter($request);

        return response()->json(array(
            "draw"            => (int) $request['draw'] ,
            "recordsTotal"    => (int)  $data['totalAmount'] ,
            "recordsFiltered" => (int)  $data['totalFiltered'] ,
            "data"            => ItemController::renderList($data['license'])
        ));
    }

    public function getListItem(Request $request){
        $id_user = Auth::user()->id;
        $data = $this->item->filter($request, $id_user);
        return response()->json(array(
            "draw"            => (int) $request['draw'] ,
            "recordsTotal"    => (int)  $data['totalAmount'] ,
            "recordsFiltered" => (int)  $data['totalFiltered'] ,
            "data"            => ItemController::renderList($data['license'])
        ));
    }
    

    private static function renderList($license){
        $list_license = [];
        if($license){
            foreach($license as $value)
            {   
                $link = array();
                if(strpos($value->link, "ttps")){
                    $getlink = explode('https://', $value->link);
                    $link = explode('/', $getlink['1']);
                }
                if(strpos($value->link, "ttps://www")){
                    $getlink = explode('https://www.', $value->link);
                    $link = explode('/', $getlink['1']);
                }
                $xlink = isset($link['0']) ? $link['0'] : $value->link;
                
                array_push($list_license,
                    [
                        'id' => $value->id,
                        'id_user'=> $value->user ? $value->user->name : "",
                        'id_county' => $value->county ? $value->county->name : '' ,
                        'title'=> '<a href="'.url('/item/add'.'?'.'id'.'='.$value->id).'"> '.$value->title.'</a>',
                        'images' => Image::countImg($value->id),
                        'price' => number_format($value->price),
                        'id_brand' => $value->brand ? $value->brand->name : "",
                        'id_model'=> $value->model ? $value->model->name : "",
                        'year' => $value->year ? $value->year : "",
                        'name'=> $value->name ? $value->name : "",
                        'phone' => $value->phone ? $value->phone : "",
                        'link' => '<a href="'.$value->link.'" target="_blank">'.$xlink.'</a>',
                        'imported' => $value->imported ? $value->imported : "",
                        'active' => $value->active == 1 ? '<i class="fa fa-check action active" aria-hidden="true"></i>' : '<i class="fa fa-times action ban" aria-hidden="true"></i>',
                        'created_at'=> $value->created_at ? Carbon::parse($value->created_at)->format('m/d/Y') : "",
                        'checkbox' => '<i class="fa fa-trash-o delete ban" aria-hidden="true" value="'.$value->id.'"></i>',
                    ]
                );
            }
        }
        return $list_license;
    }

       /**
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request){
        $item = Item::find($request->id);
        $msg = '';
        $stt = '';
        if($item){
            $item->update(['active'=>$request->status]) ? ($msg = ('success') && $stt = true) : ($msg = ('upd_err') && $stt = false) ;
        }
        else{
            $msg = ('upd_err') && $stt = false ;
        }
        return response(['msg' => $msg, 'status' => $stt]);
    }


     /**
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $request){
        $item = Item::find($request->id);
        $msg = '';
        $stt = '';
        if(!count($item->models)){
            $item->delete() ? ($msg = ('deleted') && $stt = true) : ($msg = ('upd_err') && $stt = false) ;
        }
        else{
            $msg = ('cannot_del');
            $stt = false ;
        }
        return response(['msg' => $msg, 'status' => $stt]);
    }

    public function listItem(){
        $id_user = Auth::user()->id;
        $users = '';
        return view('admin.listitem', compact('users','id_user'));
    }

   
    public function showForm(Request $request){
        $user = Auth::user();
        $item = [];
        $item = $request->id ? Item::find($request->id) : $item;
        $cost = $user->price;
        $brands = Brand::all();
        $models = Models::all();
        $countys = County::all();
        $type = $this->item->types;
        $km_ranges = $this->item->km_ranges;
        return view('admin.item', compact('item','brands','models','countys','type','cost','km_ranges'));
    }

    public function save(Request $request){
        $user = Auth::user();
        $all_request = $request->all();
        $validator = Validator::make($all_request, [
            'id_county' => 'required',
            'title' => 'required|max:255',
            'price' => 'required',
            'year' => 'numeric',
            'description' => 'required',
            'phone' => 'required|numeric',
            'link' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'errors'=>$validator->errors()->all()
            ]);
        }


        $price =  str_replace(',', '', $all_request['price']);
        $all_request['price'] =  floatval(str_replace('.', '', $price));
        if($all_request['id_item']){
            $item = Item::find($all_request['id_item']);
            $item->update($all_request);
        }else{
            $item = $user->items()->create($all_request);
        }
        return response()->json([
            'success'=>'Record is successfully added',
            'id_item' => $item->id
        ]);
    }   

    public function upload(Request $request)
    {
        $current_date = date("Y-m-d");
        $folderDir = '/images/'.$current_date;
        $path = public_path().'/'.$folderDir;
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');
                foreach ($request->file('file') as $fileObject ) {
                    // make sure each file is valid
                    if ($fileObject->isValid()) {
                        // make destination file name
                        $destinationFileName = 'okxe_'.$request->id_item.'_'.$fileObject->getClientOriginalName();
                        // move the file from tmp to the destination path
                        $fileObject->move($path, $destinationFileName);
                        // save the the destination filename
                        $image = new Image();
                        $image->url = 'public'.$folderDir.'/'. $destinationFileName;
                        $image->id_item = $request->id_item;
                        $image->save();
                    }
                }
            }
        }
    }

    public function getModel(Request $request){
        $all_request = $request->all();
        $models = Models::getByIdBrand($all_request['id_brand']);
        foreach($models as $key => $value) {
    		echo '<option value="'.$value->id.'">'.$value->name.'</option>';
    	}
    }
}
