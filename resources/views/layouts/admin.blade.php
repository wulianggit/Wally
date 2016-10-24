<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=480, initial-scale=1.0">

	<title>iWally后台系统</title>

	{{--Bootstrap--}}
	<link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
	{{--Font Awesome --}}
	<link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	{{--NProgress--}}
	<link href="{{asset('backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
	{{--Custom Theme Style--}}
	@yield('css')
	<link href="{{asset('backend/build/css/custom.min.css')}}" rel="stylesheet">
	@yield('style')
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{ url('/admin') }}" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
					</div>

					<div class="clearfix"></div>

					{{--menu profile quick info--}}
					<div class="profile">
						<div class="profile_pic">
							<img src="{{asset('backend/images/img.jpg')}}" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>John Doe</h2>
						</div>
					</div>
					{{--/menu profile quick info--}}

					<br />

					{{--sidebar menu --}}
					@include('layouts.sidebar')
					{{--/sidebar menu--}}

					{{--menu footer buttons--}}
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					{{--/menu footer buttons--}}

				</div>
			</div>

			{{--top navigation--}}
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="{{ url('/logout') }}" class="user-profile">Logout</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			{{--/top navigation--}}

			{{--page content--}}
			<div class="right_col" role="main">
				@yield('content')
			</div>
			{{--/page content--}}

			{{--footer content--}}
			<footer>
				<div class="pull-right">
					Gentelella - Bootstrap Admin Template by <a href="#">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			{{--/footer content--}}
		</div>
	</div>

	{{--jQuery--}}
	<script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
	{{--Bootstrap--}}
	<script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	{{--FastClick--}}
	<script src="{{asset('backend/vendors/fastclick/lib/fastclick.js')}}"></script>
	{{--NProgress--}}
	<script src="{{asset('backend/vendors/nprogress/nprogress.js')}}"></script>
	@yield('js')
	{{--Custom Theme Scripts--}}
	<script src="{{asset('backend/build/js/custom.min.js')}}"></script>
</body>
</html>
