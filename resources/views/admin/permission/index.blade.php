@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="cleaarfix"></div>
    <div style="margin-top: 65px;">
        @include('flash::message')
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{ url('admin/permission/create') }}" class="btn btn-info active" role="button">{{trans('sidebar.permission.create')}}</a>
                    <h2 class="pull-right" style="margin-right:10px;">{{trans('sidebar.permission.list')}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>权限</th>
                            <th>权限名称</th>
                            <th>描述</th>
                            <th>添加时间</th>
                            <th>更新时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/backend/permission.js')}}"></script>
    <script type="text/javascript">
        permission.permissionList();
        // flash message auto close
        $('div.alert').not('.alert-important').delay(8000).fadeOut(500);
    </script>
@endsection
