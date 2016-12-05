@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/css/access.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="clearfix"></div>

    @inject('rolePresenter', 'App\Repositories\Presenter\Admin\RolePresenter')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{ url('admin/role') }}" class="btn btn-info active" role="button">{{trans('sidebar.role.list')}}</a>
                    <h2 class="pull-right" style="margin-right:10px;">{{trans('sidebar.role.create')}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('admin/role') }}">
                        {{csrf_field()}}

                        <div class="item form-group {{$errors->has('name') ? 'bad' : ''}}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">{{trans('label.role.name')}}： <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="{{trans('label.role.name')}}" required="required" type="text" value="{{old('name')}}">
                            </div>
                            @if ($errors->has('name'))
                                <div class="alert">{{$errors->first('name')}}</div>
                            @endif
                        </div>


                        <div class="item form-group {{$errors->has('display_name') ? 'bad' : ''}}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="display_name">{{trans('label.role.display_name')}}: <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" id="display_name" name="display_name" placeholder="{{trans('label.role.display_name')}}" required="required" class="form-control col-md-7 col-xs-12" value="{{old('display_name')}}">
                            </div>
                            @if ($errors->has('display_name'))
                                <div class="alert">{{$errors->first('display_name')}}</div>
                            @endif
                        </div>


                        <div class="item form-group {{$errors->has('description') ? 'bad' : ''}}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">{{trans('label.role.description')}}: <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" id="description" name="description" placeholder="{{trans('label.role.description')}}" required="required" class="form-control col-md-7 col-xs-12" value="{{old('description')}}">
                            </div>
                            @if ($errors->has('description'))
                                <div class="alert">{{$errors->first('description')}}</div>
                            @endif
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">{{ trans('label.role.setAccess') }}: <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div id="wrap">
                                    {!! $rolePresenter->handlePermission($permissions) !!}
                                </div>
                            </div>
                        </div>

                        @include('admin.common.globalButton')

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function(){
            $('input[level=1]').change(function () {
                var inputs = $(this).parents('.app').find('input');
                $(this).prop('checked') ? inputs.prop('checked', true) : inputs.prop('checked',false);
            });
        });
    </script>
@endsection
