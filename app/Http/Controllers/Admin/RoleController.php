<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\Admin\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * @var \App\Repositories\Eloquent\Admin\RoleRepository
     */
    private $model;

    /**
     * RoleController constructor.
     *
     * @param $model
     */
    public function __construct(RoleRepository $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RoleRequest $request)
    {
        $result = $this->model->create($request->all());
        if ($result) {
            flash(trans('alert.role.create_success'), 'success');
        } else {
            flash(trans('alert.role.create_error'), 'error')->important();
        }

        return redirect('admin/role');
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
     * 异步获取角色列表
     * @return mixed
     * @author wuliang
     */
    public function ajaxGetRoleList ()
    {
        $result = $this->model->ajaxGetRoleList();
        return response()->json([
            'draw' => $result['draw'],
            'recordsTotal'    => $result['count'],
            'recordsFiltered' => $result['total'],
            'data' => $result['data'],
        ]);
    }
}