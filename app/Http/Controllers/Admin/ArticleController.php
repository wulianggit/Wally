<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\Admin\ArticleRepository;
use App\Repositories\Eloquent\Admin\CategoryRepository;
use App\Repositories\Eloquent\Admin\LabelRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * @var \App\Repositories\Eloquent\Admin\ArticleRepository
     */
    private $articleModel;

    /**
     * @var \App\Repositories\Eloquent\Admin\CategoryRepository
     */
    private $cateModel;

    /**
     * @var \App\Repositories\Eloquent\Admin\LabelRepository
     */
    private $labelModel;

    /**
     * ArticleController constructor.
     *
     * @param CategoryRepository $categoryRepository
     * @param ArticleRepository $articleRepository
     * @param LabelRepository $labelRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ArticleRepository $articleRepository,
        LabelRepository $labelRepository
    )
    {
        $this->articleModel = $articleRepository;
        $this->cateModel    = $categoryRepository;
        $this->labelModel   = $labelRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->cateModel->getCateList();
        $labelList    = $this->labelModel->getLabelList();
        return view('admin.article.create')->with(compact('categoryList', 'labelList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
}
