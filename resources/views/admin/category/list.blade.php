@extends('layouts.admin')

@section('css')
    <!-- iCheck -->
    <link href="{{asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{asset('backend/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('backend/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- nestable -->
    <link href="{{asset('backend/vendors/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet">
@endsection

@section('style')
    {{--自定义样式--}}
    <link href="{{asset('backend/css/list.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>分类管理</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="row">
        {{--分类列表 start--}}
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>分类列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        {{--分类列表 end--}}

        {{--添加分类 start--}}
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>添加分类</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <form method="post" action="{{ url('/admin/category') }}" class="form-horizontal form-label-left">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="control-label col-xs-12 col-sm-3 col-md-3">分类名称</label>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="请输入分类名称" value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">上级分类</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="pid" >
                                    <option value="0">顶级分类</option>
                                    <option value="1">Web</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sort" class="control-label col-xs-12 col-sm-3 col-md-3">排序</label>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <input type="number" class="form-control" id="sort" min="0" name="sort" value="{{old('sort',0)}}">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        {{--添加分类 end--}}
    </div>

@endsection


@section('js')
    <!-- Select2 -->
    <script src="{{asset('backend/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- nestable -->
    <script src="{{asset('backend/vendors/jquery-nestable/jquery.nestable.js')}}"></script>
    <!-- menuList -->
    <script src="{{asset('backend/js/menu/menuList.js')}}"></script>
    <script>
        $(document).ready(function() {
            MenuList.init();
        });
    </script>
@endsection