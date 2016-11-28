<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\Admin\PermissionRepository;
use App\Transform\PermissionTransform;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * @var \App\Repositories\Eloquent\Admin\PermissionRepository
     */
    private $model;

    /**
     * PermissionController constructor.
     *
     * @param $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->model = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PermissionRequest $request)
    {
        $result = $this->model->create($request->all());
        if ($result) {
            flash(trans('alert.permission.create_success'), 'success');
        } else {
            flash(trans('alert.permission.create_error'), 'error')->important();
        }

        return redirect('admin/permission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 异步获取权限列表
     * @return mixed
     * @author wuliang
     */
    public function ajaxGetPermissionList()
    {
        $result = $this->model->ajaxGetPermissionList();
        return response()->json([
            'draw' => $result['draw'],
            'recordsTotal'    => $result['count'],
            'recordsFiltered' => $result['total'],
            'data' => $result['data'],
        ]);
    }
}
