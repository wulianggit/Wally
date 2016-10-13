@extends('layouts.admin')

@section('css')
    {{--iCheck--}}
    <link href="{{asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    {{--Select2--}}
    <link href="{{asset('backend/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    {{--Switchery--}}
    <link href="{{asset('backend/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    {{--nestable--}}
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

    @inject('catePresenter', 'App\Repositories\Presenter\Admin\CategoryPresenter')

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

                <div class="x_content bs-example-popovers">
                    <div class="dd" id="categoryList">
                        <ol class="dd-list">
                            {!! $catePresenter->handleCategoryList($cateList) !!}
                        </ol>
                    </div>
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
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <form method="post" action="{{ url('/admin/category') }}" class="form-horizontal form-label-left" id="cateForm">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? 'parsley-error' : '' }}">
                            <label for="name" class="control-label col-xs-12 col-sm-3 col-md-3">分类名称</label>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="请输入分类名称" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <p class="text-danger text-left error-p">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">上级分类</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="pid" >
                                    {!! $catePresenter->getTopCate($topCates) !!}
                                </select>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('sort') ? 'parsley-error' : '' }}">
                            <label for="sort" class="control-label col-xs-12 col-sm-3 col-md-3">排序</label>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <input type="number" class="form-control" id="sort" min="0" name="sort" placeholder="请输入排序值" value="{{old('sort')}}">
                                @if ($errors->has('sort'))
                                    <p class="text-danger text-left">
                                        <strong>{{ $errors->first('sort') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">取消</button>
                                <button id="send" type="submit" class="btn btn-success">提交</button>
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
    {{--Select2--}}
    <script src="{{asset('backend/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    {{--nestable--}}
    <script src="{{asset('backend/vendors/jquery-nestable/jquery.nestable.js')}}"></script>
    {{--layer--}}
    <script src="{{asset('backend/vendors/layer/layer.js')}}"></script>
    {{--menuList--}}
    <script src="{{asset('backend/js/category/category.js')}}"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            Category.init();
            // flash message auto close
            $('div.alert').not('.alert-important').delay(8000).fadeOut(500);
        });
    </script>
@endsection
