@extends('admin.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Payment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.save.payment')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id_user') ? ' has-error' : '' }}">
                            <label for="id_user" class="col-md-4 control-label">User name</label>

                            <div class="col-md-6">
                            
                                <select id="type" data-column="3" name = "id_user"  class="search-input-select form-control width100percent">
                                    @if($payment)
                                        <option value="{{$payment->user ? $payment->user->id : '' }}">{{$payment->user ? $payment->user->name  : '--------------------' }}</option>
                                    @else
                                        <option value="">--------------------</option>
                                    @endif
                                    @foreach($users as $value)
                                        <option value="{{$value['id']}}" >{{$value['name']}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{$payment ? number_format($payment->amount) : ""}}">
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bonus') ? ' has-error' : '' }}">
                            <label for="bonus" class="col-md-4 control-label">Bonus</label>
                            <div class="col-md-6">
                                <input id="bonus" type="text" class="form-control" name="bonus" value="{{$payment ? number_format($payment->bonus) : ""}}">
                                @if ($errors->has('bonus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bonus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
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
