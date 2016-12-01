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
            <h3>{{ trans('sidebar.category.manager') }}</h3>
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
                    <h2>{{ trans('sidebar.category.list') }}</h2>
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
                    <h2 class="cate_title">{{ trans('sidebar.category.create') }}</h2>
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
                            <label for="name" class="control-label col-xs-12 col-sm-3 col-md-3">{{ trans('label.category.name') }}</label>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('label.category.placeName') }}" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <p class="text-danger text-left error-p">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('label.category.parentCate') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="pid" >
                                    {!! $catePresenter->getTopCate($topCates) !!}
                                </select>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('sort') ? 'parsley-error' : '' }}">
                            <label for="sort" class="control-label col-xs-12 col-sm-3 col-md-3">{{ trans('label.category.sort') }}</label>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <input type="number" class="form-control" id="sort" min="0" name="sort" placeholder="{{ trans() }}" value="{{old('sort')}}">
                                @if ($errors->has('sort'))
                                    <p class="text-danger text-left">
                                        <strong>{{ $errors->first('sort') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        @include('admin.common.globalButton')

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
    {{--categoryList--}}
    <script src="{{asset('backend/js/backend/category.js')}}"></script>
    <script src="{{ asset('backend/js/common/common.js') }}"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            Category.init();
            Common.initSelect2("select2_single","请选择上级分类");
            Common.initNestable("categoryList", true);
            // flash message auto close
            $('div.alert').not('.alert-important').delay(8000).fadeOut(500);
        });
    </script>
@endsection
