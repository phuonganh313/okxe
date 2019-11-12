@extends('admin.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.user.create')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('facebook_name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Facebook name</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="facebook_name" value="{{ old('facebook_name') }}">

                                @if ($errors->has('facebook_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('facebook_url') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Facebook url</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="facebook_url" value="{{ old('facebook_url') }}">

                                @if ($errors->has('facebook_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('threshold') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Payment threshold</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="threshold" value="{{ old('threshold') }}">

                                @if ($errors->has('threshold'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('threshold') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Bank name</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_branch') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Bank branch</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="bank_branch" value="{{ old('bank_branch') }}">

                                @if ($errors->has('bank_branch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_branch') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('beneficiary_account') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Bank account</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="beneficiary_account" value="{{ old('beneficiary_account') }}">

                                @if ($errors->has('beneficiary_account'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beneficiary_account') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('beneficiary_name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Beneficiary name</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="beneficiary_name" value="{{ old('beneficiary_name') }}">

                                @if ($errors->has('beneficiary_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beneficiary_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="price" value="{{ old('price') }}">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Permission</label>
                            <div class="col-md-6">
                            <select id="type" data-column="3" name = "id_role"  class="search-input-select form-control width100percent">
                            @foreach($permission as $key=>$value)
                                <option value="{{$key}}" >{{$value}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
