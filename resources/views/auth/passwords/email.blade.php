@extends('layouts.auth')

<!-- Main Content -->
@section('content')
<div id="login">
    <div class="wrapper">
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ url('/password/email') }}" method="post" class="container offset1 loginform">
                            {{ csrf_field() }}
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
                                <div class="control-group">
                                    <div class="row">
                                        <div class="controls">
                                        <button type="submit" tabindex="4" class="btn btn-primary btn-block">
                                            <i class="fa fa-btn fa-envelope"></i> 发送邮件
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
