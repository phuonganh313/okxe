@extends('admin.index')
@section('content')
<div class="container">
<div class="box-header">
    <h3 class="box-title"><a href="">administrator</a> > <b>Payment</b></h3>
</div>
<form class="new_brand form-inline" data-id=0 id="add_form" action="{{route('admin.add.payment')}}" method="GET" >
    {{csrf_field()}}
    <span class="alert-box"></span>
    <span>
            <input type="submit" class="btn btn-primary" id="add" value="Add" >
    </span>
</form>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>User name</th>
        <th>Amount</th>
        <th>Bonus</th>
        <th>created</th>
      </tr>
    </thead>
    <tbody>
        @foreach($payments as $payment)
            <tr>
                <td><a href="{{url('/admin/add/payment'.'?'.'id='.$payment->id)}}">{{$payment->user->name}}</a></td>
                <td>{{number_format($payment['amount'])}}</td>
                <td>{{number_format($payment['bonus'])}}</td>
                <td>{{($payment['created_at'])}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection