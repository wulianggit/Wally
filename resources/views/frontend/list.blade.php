@extends('layouts.frontend')

@section('content')
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
                                    <a href="{{url('frontend/home/'.$article['id'])}}">{{$article['title']}}</a>
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

            @include('frontend.side')

        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end content -->
@endsection
