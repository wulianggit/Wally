@extends('layouts.admin')

@section('content')
<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href="{{ url('admin/user') }}" class="btn btn-info active" role="button">用户列表</a>
				<h2 class="pull-right" style="margin-right:10px;">添加用户</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<form class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('admin/user') }}">
					{{csrf_field()}}

					<div class="item form-group {{$errors->has('name') ? 'bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">姓名： <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="请输入用户姓名" required="required" type="text" value="{{old('name')}}">
						</div>
						@if ($errors->has('name'))
						<div class="alert">{{$errors->first('name')}}</div>
						@endif
					</div>


					<div class="item form-group {{$errors->has('username') ? 'bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">用户名 <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="username" name="username" placeholder="请输入用户名" required="required" class="form-control col-md-7 col-xs-12" value="{{old('username')}}">
						</div>
						@if ($errors->has('username'))
						<div class="alert">{{$errors->first('username')}}</div>
						@endif
					</div>


                    <div class="item form-group {{$errors->has('password') ? 'bad' : ''}}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">密码 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password" name="password" placeholder="请输入密码" required="required" class="form-control col-md-7 col-xs-12" value="{{old('password')}}">
                        </div>
                        @if ($errors->has('password'))
                            <div class="alert">{{$errors->first('password')}}</div>
                        @endif
                    </div>


                    <div class="item form-group {{$errors->has('password_confirmation') ? 'bad' : ''}}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">确认密码 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="请确认密码" required="required" class="form-control col-md-7 col-xs-12" value="{{old('password_confirmation')}}">
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <div class="alert">{{$errors->first('password_confirmation')}}</div>
                        @endif
                    </div>


					<div class="item form-group {{$errors->has('email') ? 'bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">用户邮箱<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="email" id="email" name="email" placeholder="请输入用户邮箱" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="{{old('email')}}">
						</div>
						@if ($errors->has('email'))
						<div class="alert">{{$errors->first('email')}}</div>
						@endif
					</div>

					@include('admin.common.globalButton')

				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/vendors/validator/validator.js')}}"></script>
<script src="{{ asset('backend/js/common/validator.js') }}"></script>
@endsection
