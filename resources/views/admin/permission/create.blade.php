@extends('layouts.admin')

@section('content')
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{ url('admin/permission') }}" class="btn btn-info active" role="button">{{trans('sidebar.permission.list')}}</a>
                    <h2 class="pull-right" style="margin-right:10px;">{{trans('sidebar.permission.create')}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('admin/permission') }}">
                        {{csrf_field()}}

                        <div class="item form-group {{$errors->has('name') ? 'bad' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('label.permission.name')}}： <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="{{trans('label.permission.name')}}" required="required" type="text" value="{{old('name')}}">
                            </div>
                            @if ($errors->has('name'))
                                <div class="alert">{{$errors->first('name')}}</div>
                            @endif
                        </div>


                        <div class="item form-group {{$errors->has('display_name') ? 'bad' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="display_name">{{trans('label.permission.display_name')}}: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="display_name" name="display_name" placeholder="{{trans('label.permission.display_name')}}" required="required" class="form-control col-md-7 col-xs-12" value="{{old('display_name')}}">
                            </div>
                            @if ($errors->has('display_name'))
                                <div class="alert">{{$errors->first('display_name')}}</div>
                            @endif
                        </div>

                        <div class="item form-group {{$errors->has('model') ? 'bad' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">{{trans('label.permission.model')}}: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="model" name="model" placeholder="{{trans('label.permission.model')}}" required="required" class="form-control col-md-7 col-xs-12" value="{{old('model')}}">
                            </div>
                            @if ($errors->has('model'))
                                <div class="alert">{{$errors->first('model')}}</div>
                            @endif
                        </div>


                        <div class="item form-group {{$errors->has('description') ? 'bad' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">{{trans('label.permission.description')}}: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="description" name="description" placeholder="{{trans('label.permission.description')}}" required="required" class="form-control col-md-7 col-xs-12" value="{{old('description')}}">
                            </div>
                            @if ($errors->has('description'))
                                <div class="alert">{{$errors->first('description')}}</div>
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
@endsection
