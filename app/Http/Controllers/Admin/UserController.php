<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Transform\UsersTransform;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $usersTransform;

    /**
     * 构造函数依赖注入 UsersTransform 类
     * @date   2016-09-24
     * @author Wally
     * @param  UsersTransform $usersTransform [description]
     */
    public function __construct(UsersTransform $usersTransform)
    {
        $this->usersTransform = $usersTransform;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
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
     * ajax获取用户列表
     * @date   2016-09-24
     * @author Wally
     * @return [type]     [description]
     */
    public function ajaxGetUserList () 
    {
        $draw = request('draw', 1);
        $user = User::all()->toArray();
        return response()->json([
            'draw' => $draw,
            'recordsTotal' => 10,
            'recordsFiltered' => 10,
            'data' => $this->usersTransform->transformCollection($user),
        ]);
    }
}
