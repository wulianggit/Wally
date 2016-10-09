@extends('layouts.admin')

@section('content')
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>添加用户</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
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
					
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="reset" class="btn btn-primary">取消</button>
							<button id="send" type="submit" class="btn btn-success">提交</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/vendors/validator/validator.js')}}"></script>
{{-- validator --}}
<script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
      .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      .on('change', 'select.required', validator.checkField)
      .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
      	validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
      	e.preventDefault();
      	var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
        	submit = false;
        }

        if (submit)
        	this.submit();
        return false;
    });
</script>
{{-- /validator --}}
@endsection