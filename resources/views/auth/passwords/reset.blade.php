@extends('layouts.auth')

@section('content')
<div id="login">
    <div class="wrapper">
        <div class="login">
            <div class="container">
                <div class="row">
                    <form action="{{ url('/password/reset') }}" method="post" class="container offset1 loginform">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="pad">
                            <div class="control-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="controls">
                                        <div class="input-group">
                                            <div class="input-group-addon glyphicon glyphicon-envelope"></div>

                                            <input id="email" type="email" name="email" placeholder="邮箱" tabindex="2" class="form-control input-medium{{ $errors->has('email') ? ' parsley-error' : '' }}" value="{{ old('email') }}">
                                        </div>
                                        @if ($errors->has('email'))
                                        <div class="col-md-12 error">
                                            <p class="text-danger"><strong>{{ $errors->first('email') }}</strong></p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="controls">
                                        <div class="input-group">
                                            <div class="input-group-addon glyphicon glyphicon-lock"></div>

                                            <input id="password" type="password" name="password" placeholder="密码" tabindex="2" class="form-control input-medium{{ $errors->has('password') ? ' parsley-error' : '' }}" value="{{ old('password') }}">
                                        </div>
                                        @if ($errors->has('password'))
                                        <div class="col-md-12 error">
                                            <p class="text-danger"><strong>{{ $errors->first('password') }}</strong></p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="control-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="controls">
                                        <div class="input-group">
                                            <div class="input-group-addon glyphicon glyphicon-lock"></div>

                                            <input id="password-confirm" type="password-confirm" name="password-confirm" placeholder="密码" tabindex="2" class="form-control input-medium{{ $errors->has('password-confirm') ? ' parsley-error' : '' }}" value="{{ old('password-confirm') }}">
                                        </div>
                                        @if ($errors->has('password-confirm'))
                                        <div class="col-md-12 error">
                                            <p class="text-danger"><strong>{{ $errors->first('password-confirm') }}</strong></p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="row">
                                    <div class="controls">
                                        <button type="submit" tabindex="4" class="btn btn-primary btn-block">
                                        <i class="fa fa-btn fa-envelope"></i> 重设密码
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
