<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台登录页面</title>
	<!-- Bootstrap -->
	<link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('backend/css/reset.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/login.css')}}">
</head>
<body>
	@yield('content');
	<!-- jQuery -->
	<script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
	<script type="text/javascript">
		$(function() {
			$('#login #password').focus(function() {
				$('#owl-login').addClass('password');
			}).blur(function() {
				$('#owl-login').removeClass('password');
			});
		});
	</script>
</body>
</html>