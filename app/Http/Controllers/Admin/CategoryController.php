<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\Admin\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    /**
     * @var
     */
    private $model;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->model = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取顶级分类列表
        $topCates = $this->model->findByField('pid', 0, ['id', 'name']);

        // 获取所有文章分类列表
        $cateList = $this->model->getCateList();
        
        return view('admin.category.list')->with(compact('topCates', 'cateList'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $result = $this->model->create($request->all());

        if ($result) {
            flash(trans('alert.category.create_success'), 'success');
        } else {
            flash(trans('alert.category.create_error'), 'error')->important();
        }

        return redirect('admin/category');
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
        $categoryData = $this->model->editCategory($id);
        return response()->json($categoryData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        $result = $this->model->updateCategory($request);

        if ($result) {
            flash(trans('alert.category.update_success'), 'success');
        } else {
            flash(trans('alert.category.update_error'), 'error')->important();
        }

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->model->destoryCategory($id);

        if ($result) {
           flash(trans('alert.category.delete_success'), 'success');
        } else {
            flash(trans('alert.category.delete_error'), 'error')->important();
        }

        return redirect('admin/category');
    }
}
