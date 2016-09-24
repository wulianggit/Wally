@extends('layouts.auth')

@section('content')

<div id="login">
    <div class="wrapper">
        <div class="login">
            <form action="{{ url('/login') }}" method="post" class="container offset1 loginform">
                <div id="owl-login">
                    <div class="hand"></div>
                    <div class="hand hand-r"></div>
                    <div class="arms">
                        <div class="arm"></div>
                        <div class="arm arm-r"></div>
                    </div>
                </div>
                <div class="pad">
                    {{csrf_field()}}
                    <div class="control-group{{ $errors->has(config('admin.globals.loginField')) ? ' has-error' : '' }}">
                        <div class="controls">
                            <div class="input-group">
                                <div class="input-group-addon glyphicon 
                                @if (config('admin.globals.loginField') == 'username')
                                {{'glyphicon-user'}}
                                @else
                                {{'glyphicon-envelope'}}
                                @endif"></div>

                                <input id="username" type="{{ config('admin.globals.loginField') == 'username' ? 'text' : 'email' }}" name="{{ config('admin.globals.loginField') }}" placeholder="{{ config('admin.globals.loginField') == 'username' ? '用户名' : '邮箱' }}" tabindex="1" autofocus="autofocus" class="form-control input-medium{{ $errors->has(config('admin.globals.loginField')) ? ' parsley-error' : '' }} " value="{{ old(config('admin.globals.loginField')) }}">
                            </div>
                            @if ($errors->has(config('admin.globals.loginField')))
                            <div class="col-md-12 error">
                                <p class="text-danger"><strong>{{ $errors->first(config('admin.globals.loginField')) }}</strong></p>
                            </div>   
                            @endif
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
                    <div class="control-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="controls">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon glyphicon glyphicon-check"></div>
                                        <input id="captcha" type="text" name="captcha" placeholder="验证码" tabindex="2" class="form-control input-medium{{ $errors->has('captcha') ? ' parsley-error' : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img class="captcha" src="{{ Captcha::src() }}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}' + Math.random()">
                                </div> 
                                @if ($errors->has('captcha'))
                                <div class="col-md-12 error">
                                    <p class="text-danger"><strong>{{ $errors->first('captcha') }}</strong></p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="row">
                            <div class="controls col-md-8">
                                <div class="checkbox ">
                                    <label>
                                        <input type="checkbox" name="remember"><span>remember me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="controls col-md-4">
                                <span class="forget-password"><a href="{{ url('/password/reset') }}">忘记密码</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="row">
                            <div class="controls">
                                <button type="submit" tabindex="4" class="btn btn-primary btn-block">登 录</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

