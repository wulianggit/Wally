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
                <a href="{{ url('admin/user/create') }}" class="btn btn-info active" role="button">添加用户</a>
                <h2 class="pull-right" style="margin-right:10px;">用户列表</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>用户ID</th>
                            <th>姓名</th>
                            <th>用户名</th>
                            <th>角色</th>
                            <th>邮箱</th>
                            <th>添加时间</th>
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
<script src="{{asset('backend/js/backend/usersList.js')}}"></script>
<script type="text/javascript">
    usersList.init();
    // flash message auto close
    $('div.alert').not('.alert-important').delay(8000).fadeOut(500);
</script>
@endsection
