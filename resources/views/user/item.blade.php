@extends('admin.index')
@section('content')
<div class="container">
  <h2>Item </h2>
    <form class="new_brand form-inline" data-id=0 id="add_form" action="{{route('user.item.add')}}" method="GET" >
        {{csrf_field()}}
        @if(session('alert'))
        <div id="message" class="alert alert-success">{{session('alert')}}</div>
        @endif
        <input type="hidden" id="status" name="active" value="2">
        <span class="alert-box"></span>
        <span>
            <input type="submit" class="btn btn-primary" id="add" value="Add" >
        </span>
    </form>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Price</th>
        <th>description</th>
        <th>phone</th>
        <th>link</th>
        <th>created</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item['title']}}</td>
                <td>{{$item['price']}}</td>
                <td>{{$item['description']}}</td>
                <td>{{$item['phone']}}</td>
                <td>{{$item['link']}}</td>
                <td>{{$item['created_at']}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $items->links() }}
</div>
@endsection