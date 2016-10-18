@extends('layouts.admin')

@section('css')
    {{--iCheck--}}
    <link href="{{asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
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
            <h3>标签管理</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    @inject('labelPresenter', 'App\Repositories\Presenter\Admin\LabelPresenter')

    @include('flash::message')

    <div class="row">
        {{--标签列表 start--}}
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="x_panel">

                <div class="x_title">
                    <h2>标签列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content bs-example-popovers">
                    <div class="dd" id="labelList">
                        <ol class="dd-list">
                            {!! $labelPresenter->getLabelList($labelList) !!}
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        {{--标签列表 end--}}

        {{--添加标签 start--}}
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="label_title">添加标签</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <form method="post" action="{{ url('/admin/label') }}" class="form-horizontal form-label-left" id="labelForm">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? 'parsley-error' : '' }}">
                            <label for="name" class="control-label col-xs-12 col-sm-3 col-md-3">标签名称</label>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="请输入标签名称" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <p class="text-danger text-left error-p">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        @include('admin.common.globalButton')

                    </form>
                </div>
            </div>
        </div>
        {{--添加标签 end--}}
    </div>

@endsection


@section('js')
    {{--nestable--}}
    <script src="{{asset('backend/vendors/jquery-nestable/jquery.nestable.js')}}"></script>
    {{--layer--}}
    <script src="{{asset('backend/vendors/layer/layer.js')}}"></script>
    {{--categoryList--}}
    <script src="{{asset('backend/js/backend/label.js')}}"></script>
    <script src="{{asset('backend/js/common/common.js')}}"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            Label.init();
            Common.initNestable('labelList');
            // flash message auto close
            $('div.alert').not('.alert-important').delay(5000).fadeOut(500);
        });
    </script>
@endsection
