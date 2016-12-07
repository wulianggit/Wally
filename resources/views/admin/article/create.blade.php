@extends('layouts.admin')

@section('css')
    {{--markdown编辑器--}}
    <link href="{{asset('backend/vendors/editor/css/editormd.min.css')}}" rel="stylesheet" type="text/css" />
    {{--Select2--}}
    <link href="{{asset('backend/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    {{--上传图片--}}
    <link href="{{asset('backend/css/fileinput.min.css')}}" rel="stylesheet">
@endsection

@section('style')
    {{--自定义样式--}}
    <link href="{{asset('backend/css/list.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="clearfix"></div>

    @inject('catePresenter', 'App\Repositories\Presenter\Admin\CategoryPresenter')
    @inject('tagPresenter', 'App\Repositories\Presenter\Admin\tagPresenter')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{ url('admin/user') }}" class="btn btn-info active" role="button">
                        {{ trans('label.article.list') }}
                    </a>
                    <h2 class="pull-right" style="margin-right:10px;">
                        {{ trans('label.article.add') }}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate="" method="post"
                          action="{{ url('admin/article') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="item form-group {{$errors->has('title') ? 'bad' : ''}}">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="title">
                                {{ trans('label.article.title') }}
                            </label>
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input id="title" class="form-control col-md-6 col-xs-12 col-sm-8"
                                       name="title" placeholder="{{ trans('label.article.palceTitle') }}"
                                       required="required" type="text" value="{{old('title')}}">
                            </div>
                            @if ($errors->has('title'))
                                <div class="alert">{{$errors->first('title')}}</div>
                            @endif
                        </div>


                        <div class="item form-group {{$errors->has('keyword') ? 'bad' : ''}}">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="keywords">
                                {{ trans('label.article.keyword') }}
                            </label>
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input type="text" class="form-control col-md-6 col-sm-8 col-xs-12" id="keywords"
                                       name="keyword" placeholder="{{ trans('label.article.placeKeyword') }}"
                                       required="required" value="{{old('keyword')}}">
                            </div>
                            @if ($errors->has('keyword'))
                                <div class="alert">{{$errors->first('keyword')}}</div>
                            @endif
                        </div>


                        <div class="item form-group {{$errors->has('cate_id') ? 'bad' : ''}}">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="category">
                                {{ trans('label.article.category') }}
                            </label>
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <select name="cate_id" class="select2_cate form-control" tabindex="-1" >
                                    {!! $catePresenter->getTopCate($categoryList, false) !!}
                                </select>
                            </div>
                            @if ($errors->has('cate_id'))
                                <div class="alert">{{$errors->first('cate_id')}}</div>
                            @endif
                        </div>

                        <div class="item form-group {{$errors->has('label') ? 'bad' : ''}}">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="label">
                                {{ trans('label.article.label') }}
                            </label>
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <select name="label[]" multiple="multiple" class="select2_label form-control" tabindex="-1" >
                                    {!! $tagPresenter->tagSelectOption($tagList) !!}
                                </select>
                            </div>
                            @if ($errors->has('label'))
                                <div class="alert">{{$errors->first('label')}}</div>
                            @endif
                        </div>

                        <div class="item form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12">
                                {{ trans('label.article.cover') }}
                            </label>
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input class="file" type="file" id="cover" name="cover">
                            </div>
                        </div>

                        <div class="item form-group {{$errors->has('introduce') ? 'bad' : ''}}">
                            <label class="col-md-12 col-sm-12 col-xs-12">
                                {{ trans('label.article.introduce') }}
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <textarea name="introduce" class="form-control" rows="5"
                                          required="required" placeholder="{{ trans('label.article.placeIntro') }}"
                                >{{ old('introduce') }}</textarea>
                            </div>
                            @if ($errors->has('introduce'))
                                <div class="alert">{{$errors->first('introduce')}}</div>
                            @endif
                        </div>


                        <div class="item form-group {{$errors->has('content') ? 'bad' : ''}}">
                            <label class="col-md-12 col-sm-12 col-xs-12">
                                {{ trans('label.article.content') }}
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="editor">
                                    <textarea style="display: none;">{!!old('editor-markdown-doc')!!}</textarea>
                                </div>
                            </div>
                            @if ($errors->has('content'))
                                <div class="alert">{{$errors->first('content')}}</div>
                            @endif
                        </div>

                        @include('admin.common.globalButton')

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{--Select2--}}
    <script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    {{--数据验证--}}
    <script src="{{ asset('backend/vendors/validator/validator.js') }}"></script>
    <script src="{{ asset('backend/js/common/validator.js') }}"></script>
    {{--markdown编辑器--}}
    <script src="{{ asset('backend/vendors/editor/js/editormd.min.js') }}"></script>
    {{--上传图片--}}
    <script src="{{ asset('backend/js/backend/fileinput.min.js') }}"></script>
    <script src="{{ asset('backend/js/backend/fileinput_locale_zh.js') }}"></script>
    {{--各插件初始化--}}
    <script src="{{ asset('backend/js/backend/article.js') }}"></script>
    <script src="{{ asset('backend/js/common/common.js') }}"></script>
    <script type="application/javascript">
        var path   = "{{asset('backend/vendors/editor/lib')}}/";
        var upload = '/admin/article/upload';
        Article.editor('editor', path, upload);
        Common.initSelect2('select2_cate', '请选择文章分类');
        Common.initSelect2('select2_label', '请选择文章标签');
        $("#cover").fileinput({
            msgInvalidFileType : "images",
            allowedFileExtensions : ['jpg', 'png','gif'],
            uploadUrl : "#",
            dropZoneTitle : '{{trans('label.article.dropZoneTitle')}}',
            browseLabel : "{{trans('label.article.coverSelect')}}",
            browseIcon: "", // 图标
            uploadAsync: false,  //同步
            showCaption: false,//是否显示标题
            showUpload: false, //是否显示上传按钮
            showRemove : false, //显示移除按钮
            browseClass: "btn btn-primary btn-block", //按钮样式
        });
    </script>
@endsection
