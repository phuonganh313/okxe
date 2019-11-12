@extends('admin.index')
@section('content')

    <div class="container" >

        <div class="row">
            <!--box header-->
            <div class="box-header">
                <h3 class="box-title"><a href="">administrator</a> > <b>Item</b></h3>
            </div>
            <div class="col-md-12" style="margin-top:30px;">

                <div class="box">
                    <!--end box header-->
                    <!--box body-->
                    <div class="box-body" style="background:white;">
                        <form class="new_brand form-inline" data-id=0 id="add_form" action="{{route('user.item.add')}}" method="GET" >
                            {{csrf_field()}}
                            <input type="hidden" id="status" name="active" value="2">
                            <span class="alert-box"></span>
                            <span>
                                    <input type="submit" class="btn btn-primary" id="add" value="Add" >
                                </span>
                        </form>
                        <form action="" method="post" class="form-inline" style="margin-top:30px;background:white;">
                        {{csrf_field()}}
                        <!--alert-->
                            @if(session('alert'))
                                <div id="message" class="alert alert-success">{{session('alert')}}</div>
                        @endif
                        <!--end alert-->
                            <!--Table-->

                            <table id="itemTable" cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped" width="100%">
                                <thead class="">
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>County</th>
                                    <th>Title</th>
                                    @if(Auth::user()->id_role == 1 && !$id_user)
                                    <th>Images</th>
                                    @endif
                                    <th>Price</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Link</th>
                                    <th>Date</th>
                                    <th>imported</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <td class="width10percent"><input type="text" data-column="0"  class="search-input-text form-control width100percent"></td>
                                    @if($users)
                                    <td class="width5percent">
                                        <select data-column="1"  class="search-input-select bs-filters form-control width100percent">
                                            <option value="">------</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                    <td class="width10percent"><input type="text" data-column="1"  class="search-input-text form-control width100percent"></td> 
                                    @endif
                                    <td class="width10percent"><input type="text" data-column="2"  class="search-input-text form-control width100percent"></td>    
                                    <td class="width10percent"><input type="text" data-column="3"  class="search-input-text form-control width100percent"></td>
                                    @if(Auth::user()->id_role == 1)
                                    <td class="width10percent"><input type="text" data-column="4"  class="search-input-text form-control width100percent"></td>
                                    @endif
                                    <td class="width10percent"><input type="text" data-column="5"  class="search-input-text form-control width100percent"></td>
                                    <td class="width10percent"><input type="text" data-column="6"  class="search-input-text form-control width100percent"></td>
                                    <td class="width10percent"><input type="text" data-column="7"  class="search-input-text form-control width100percent"></td>
                                    <td class="width10percent"><input type="text" data-column="8"  class="search-input-text form-control width100percent"></td>
                                    <td class="width10percent"><input type="text" data-column="9"  class="search-input-text form-control width100percent"></td>
                                    <td class="width10percent"><input type="text" data-column="10"  class="search-input-text form-control width100percent"></td>
                                    <td class="width10percent"><input type="text" data-column="11"  class="search-input-text form-control width100percent"></td>
                                    <td class="width12percent">
                                        <input type="text" data-column="12" id="dayFrom" placeholder="from"  class="search-input-date form-control width100percent">
                                        <input type="text" data-column="13" id="dayTo" placeholder="to" class="search-input-date form-control width100percent">
                                    </td>
                                    <td class="width5percent"></td>
                                    <td class="width5percent"></td>
                                    <td class="width5percent "></td>
                                </tr>
                                </thead>

                            </table>

                            <!--end table-->
                            <!--Change status-->
                    </div>
                    <!--end sttus-->
                    </form>
                </div>
                <!--end box body-->
            </div>

        </div>

    </div>

    </div>
@endsection
@section('js')
    @if($id_user)
        <script src="{{url('/public/js/useritem.js')}}"></script>
    @else
        <script src="{{url('/public/js/item.js')}}"></script>
    @endif
@endsection
