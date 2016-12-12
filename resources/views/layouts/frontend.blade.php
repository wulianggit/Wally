<head>
    <meta charset="utf-8" />
    <title>冷无缺的Blog</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('frontend/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/theme/default.css')}}" id="theme" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    @yield('css')

</head>

<body class="pace-done">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-transparent navbar-fixed-top">
        <!-- begin container -->
        <div class="container">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand">
                    <span class="brand-logo"></span>
            <span class="brand-text">
              冷无缺
            </span>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- begin navbar-collapse -->
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    @if($navs)
                        @foreach($navs as $nav)
                            @if(count($nav['child'])>0)
                                <li class="dropdown">
                                    <a href="javascript:;" data-toggle="dropdown">{{$nav['name']}} <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                            @foreach($nav['child'] as $child)
                                                <li><a href="">{{$child['name']}}</a></li>
                                            @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a href="about_me.html">{{$nav['name']}}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>
        <!-- end container -->
    </div>
    <!-- end #header -->

    <!-- begin #page-title -->
    <div id="page-title" class="page-title has-bg">
        <div class="bg-cover">
            <img src="{{asset('frontend/img/cover2.jpg')}}" alt="" />
        </div>
        <div class="container">
            <p>Blog Concept Front End Page</p>
            <h1>Official Color Admin Blog</h1>
        </div>
    </div>
    <!-- end #page-title -->

    @yield('content')

    <!-- begin #footer -->
    <div id="footer" class="footer">
        <!-- begin container -->
        <div class="container">
            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-3">
                    <!-- begin section-container -->
                    <div class="section-container">
                        <h4 class="footer-title">Categories</h4>
                        <ul class="categories">
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Outdoor Sports</a></li>
                            <li><a href="#">Indoor Sports</a></li>
                            <li><a href="#">Video Shooting</a></li>
                            <li><a href="#">Drone</a></li>
                            <li><a href="#">Uncategorized</a></li>
                        </ul>
                    </div>
                    <!-- end section-container -->
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-3">
                    <!-- begin section-container -->
                    <div class="section-container">
                        <h4 class="footer-title">Archives</h4>
                        <ul class="archives">
                            <li><a href="#">June 2015</a> <span class="total">(102)</span></li>
                            <li><a href="#">May 2015</a> <span class="total">(46)</span></li>
                            <li><a href="#">April 2015</a> <span class="total">(84)</span></li>
                            <li><a href="#">March 2015</a> <span class="total">(67)</span></li>
                            <li><a href="#">February 2015</a> <span class="total">(99)</span></li>
                            <li><a href="#">January 2015</a> <span class="total">(113)</span></li>
                            <li><a href="#">December 2014</a> <span class="total">(25)</span></li>
                        </ul>
                    </div>
                    <!-- end section-container -->
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-3">
                    <!-- begin section-container -->
                    <div class="section-container">
                        <h4 class="footer-title">Recent Posts</h4>
                        <ul class="recent-post">
                            <li>
                                <h4>
                                    <a href="#">Nam ut urna hendrerit</a>
                                    <span class="time">February 22, 2015</span>
                                </h4>
                            </li>
                            <li>
                                <h4>
                                    <a href="#">Class aptent taciti sociosqu</a>
                                    <span class="time">July 15, 2015</span>
                                </h4>
                            </li>
                            <li>
                                <h4>
                                    <a href="#">Donec rhoncus arcu</a>
                                    <span class="time">March 21, 2015</span>
                                </h4>
                            </li>
                        </ul>
                    </div>
                    <!-- end section-container -->
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-3">
                    <div class="section-container">
                        <h4 class="footer-title">About Color Admin</h4>
                        <address>
                            <strong>Twitter, Inc.</strong><br />
                            795 Folsom Ave, Suite 600<br />
                            San Francisco, CA 94107<br />
                            P: (123) 456-7890<br />
                            <br />
                            <strong>Full Name</strong><br />
                            <a href="#">first.last@example.com</a>
                        </address>
                    </div>
                    <!-- end section-container -->
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end #footer -->

    <!-- begin #footer-copyright -->
    <div id="footer-copyright" class="footer-copyright">
        <!-- begin container -->
        <div class="container">
            <span class="copyright">© 2015 SeanTheme All Right Reserved</span>
            <ul class="social-media-list">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
        <!-- end container -->
    </div>
    <!-- end #footer-copyright -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('frontend/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('frontend/js/apps.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <!-- ================== END BASE JS ================== -->
    @yield('js')
</body>

