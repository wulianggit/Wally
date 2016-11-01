<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Repositories\Eloquent\Admin\UserRepository;
use App\Transform\UsersTransform;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var
     */
    private $model;

    /**
     * @var \App\Transform\UsersTransform
     */
    protected $usersTransform;

    /**
     * 构造函数
     * @date   2016-09-24
     * @author Wally
     * @param  UsersTransform $usersTransform [description]
     * @param  UserRepository $userRepository [description]
     */
    public function __construct(UsersTransform $usersTransform, UserRepository $userRepository)
    {
        $this->model = $userRepository;
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
        $data   = $request->all();
        $result = $this->model->create([
            'name'     => $data['name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'email'    => $data['email']
        ]);

        if ($result) {
            flash(trans('alert.user.create_success'), 'success');
        } else {
            // important方法,使消息提示框不会自动关闭
            flash(trans('alert.user.create_error'), 'error')->important();
        }

        return redirect('admin/user');
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
        $user = $this->model->all()->toArray();
        return response()->json([
            'draw' => $draw,
            'recordsTotal' => 10,
            'recordsFiltered' => 10,
            'data' => $this->usersTransform->transformCollection($user),
        ]);
    }
}
