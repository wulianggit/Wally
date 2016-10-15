<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LabelRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Admin\LabelRepository;

/**
 * Class LabelController
 *
 * @package App\Http\Controllers\Admin
 */
class LabelController extends Controller
{
    /**
     * @var
     */
    private $model;

    /**
     * LabelController constructor.
     *
     * @param LabelRepository $labelRepository
     */
    public function __construct(LabelRepository $labelRepository)
    {
        $this->model = $labelRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labelList = $this->model->getLabelList();
        return view('admin.label.list')->with(compact('labelList'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LabelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabelRequest $request)
    {
        $result = $this->model->create($request->all());

        if ($result) {
            flash('标签添加成功!', 'success');
        } else {
            false('标签添加失败', 'error')->important();
        }

        return redirect('admin/label');
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
        $label = $this->model->editLabel($id);
        return response()->json($label);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LabelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(LabelRequest $request)
    {
        $result = $this->model->updateLabel($request);

        if ($result) {
            flash('标签修改成功!', 'success');
        } else {
            flash('标签修改失败!', 'error')->important();
        }

        return redirect('admin/label');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->model->destoryLabel($id);

        if ($result) {
            flash('标签删除成功!', 'success');
        } else {
            flash('标签删除失败!', 'error')->important();
        }

        return redirect('admin/label');
    }
}
