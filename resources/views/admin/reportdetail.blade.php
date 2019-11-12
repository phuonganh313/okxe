@extends('admin.index')
@section('content')
<div class="container">
  <h2>Report {{$user->name}} </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Ngày</th>
        <th>Tin</th>
        <th>Thành tiền</th>
        <th>Đã thanh toán</th>
        <th>Thưởng</th>
        <th>Số dư</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item['day']}}</td>
                <td>{{$item['quantity']}}</td>
                <td>{{number_format($item['amount'])}}</td>
                <td>{{number_format($item['paid'])}}</td>
                <td>{{number_format($item['bonus'])}}</td>
                <td>{{number_format($item['return'])}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection