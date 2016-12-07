@extends('layouts.frontend')

@section('content')
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

<!-- begin content -->
<div id="content" class="content">
    <!-- begin container -->
    <div class="container">
        <!-- begin row -->
        <div class="row row-space-30">
            <!-- begin col-9 -->
            <div class="col-md-9">
                <!-- begin post-list -->
                <ul class="post-list">
                    @foreach($articles as $article)
                    <li>
                        <!-- begin post-left-info -->
                        <div class="post-left-info">
                            <div class="post-date">
                                <span class="day">03</span>
                                <span class="month">SEPT</span>
                            </div>
                            <div class="post-likes">
                                <i class="fa fa-heart-o"></i>
                                <span class="number">520</span>
                            </div>
                        </div>
                        <!-- end post-left-info -->
                        <!-- begin post-content -->
                        <div class="post-content">
                            <div class="post-image">
                                <a href="post_detail.html"><img src="{{asset('uploads').'/'.$article['img_path']}}" alt=""></a>
                            </div>
                            <!-- begin post-info -->
                            <div class="post-info">
                                <h4 class="post-title">
                                    <a href="post_detail.html">{{$article['title']}}</a>
                                </h4>
                                <div class="post-by">
                                    Posted By <a href="#">admin</a> <span class="divider">|</span> <a href="#">Sports</a>, <a href="#">Mountain</a>, <a href="#">Bike</a> <span class="divider">|</span> 2 Comments
                                </div>
                                <div class="post-desc">
                                    {{$article['introduce']}}
                                </div>
                            </div>
                            <!-- end post-info -->
                            <!-- begin read-btn-container -->
                            <div class="read-btn-container">
                                <a href="post_detail.html">Read More <i class="fa fa-angle-double-right"></i></a>
                            </div>
                            <!-- end read-btn-container -->
                        </div>
                        <!-- end post-content -->
                    </li>
                    @endforeach
                </ul>
                <!-- end post-list -->

                <!-- begin pagination -->
                <div class="section-container">
                    <div class="pagination-container text-center">
                        <ul class="pagination m-t-0 m-b-0">
                            <li class="disabled"><a href="javascript:;">Prev</a></li>
                            <li class="active"><a href="javascript:;">1</a></li>
                            <li><a href="javascript:;">2</a></li>
                            <li><a href="javascript:;">3</a></li>
                            <li><span class="text">...</span></li>
                            <li><a href="javascript:;">1797</a></li>
                            <li><a href="javascript:;">Next</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end pagination -->
            </div>
            <!-- end col-9 -->
            <!-- begin col-3 -->
            <div class="col-md-3">
                <!-- begin section-container -->
                <div class="section-container">
                    <div class="input-group sidebar-search">
                        <input type="text" class="form-control" placeholder="Search Our Stories...">
                            <span class="input-group-btn">
                                <button class="btn btn-inverse" style="padding: 9px 12px;" type="button"><i class="fa fa-search"></i></button>
                            </span>
                    </div>
                </div>
                <!-- end section-container -->


                <!-- begin section-container -->
                <div class="section-container">
                    <h4 class="section-title"><span>Categories</span></h4>
                    <ul class="sidebar-list">
                        <li><a href="#">Sports (20)</a></li>
                        <li><a href="#">Outdoor Sports (45)</a></li>
                        <li><a href="#">Indoor Sports (1,292)</a></li>
                        <li><a href="#">Video Shooting (12)</a></li>
                        <li><a href="#">Drone (229)</a></li>
                        <li><a href="#">Uncategorized (1,482)</a></li>
                    </ul>
                </div>
                <!-- end section-container -->


                <!-- begin section-container -->
                <div class="section-container">
                    <h4 class="section-title"><span>Recent Post</span></h4>
                    <ul class="sidebar-recent-post">
                        <li>
                            <div class="info">
                                <h4 class="title"><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                                <div class="date">23 December 2015</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end section-container -->
                <!-- begin section-container -->
                <div class="section-container">
                    <h4 class="section-title"><span>Follow Us</span></h4>
                    <ul class="sidebar-social-list">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <!-- end section-container -->
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end content -->
@endsection
