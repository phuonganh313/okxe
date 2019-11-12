@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('error'))
        <div class="alert alert-danger">
        {{\Session::get('error')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
