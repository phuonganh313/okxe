@extends('admin.index')
@section('content')
<div class="container">
  <h2>Report </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Items</th>
        <th>Current price</th>
        <th>Amount</th>
        <th>Paid</th>
        <th>Amount due</th>
        <th>Threshold</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td><a href="{{url('/admin/user/detail'.'/'.$user->id)}}">{{$user['name']}}</a></td>
                <td>{{$user['quantity_item']}}</td>
                <td>{{number_format($user['price'])}}</td>
                <td>{{number_format($user['amount'])}}</td>
                <td>{{number_format($user['paid'])}}</td>
                <td>{{number_format($user['amount_due'])}}</td>
                <td>{{number_format($user['threshold'])}}</td>
                @if($user['action'])
                <td>Pay</td>
                @else
                <td></td>
                @endif
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection