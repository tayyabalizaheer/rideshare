@extends('agent.layout.master')

@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
           <h2>{{$page_title}}</h2>
        </div>

        <form class="form-horizontal" role="form" action="" method="post">
            @csrf
        <div class="card-body">
                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                    <label class="col-md-3 offset-1 control-label"><b>Current Password</b></label>
                    <div class="col-md-9 offset-1">
                        <div class="input-group">
                            <input type="password" name="old_password" class="form-control form-control-lg"
                                   placeholder="Current Password">
                            <div class="input-group-append"><span class="input-group-text"><i
                                            class="fa fa-lock"></i></span></div>
                        </div>
                        @if ($errors->has('old_password'))
                            <strong class="error">{{ $errors->first('old_password') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                    <label class="col-md-3 offset-1 control-label"><b>New Password</b></label>
                    <div class="col-md-9 offset-1">
                        <div class="input-group">
                            <input type="password" name="new_password" class="form-control form-control-lg"
                                   placeholder="New Password">
                            <div class="input-group-append"><span class="input-group-text"><i
                                            class="fa fa-lock"></i></span></div>
                        </div>
                        @if ($errors->has('new_password'))
                            <strong class="error">{{ $errors->first('new_password') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="col-md-3 offset-1 control-label"><b>Confirm Password</b></label>
                    <div class="col-md-9 offset-1">
                        <div class="input-group">
                            <input type="password" name="password_confirmation"
                                   class="form-control form-control-lg" placeholder="Confirm Password">
                            <div class="input-group-append"><span class="input-group-text"><i
                                            class="fa fa-lock"></i></span></div>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <strong class="error">{{ $errors->first('password_confirmation') }}</strong>
                        @endif
                    </div>
                </div>




        </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary btn-block btn-lg" type="submit">Submit</button>
            </div>

        </form>
    </div>

@stop