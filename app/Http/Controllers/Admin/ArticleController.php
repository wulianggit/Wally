<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\Admin\ArticleRepository;
use App\Repositories\Eloquent\Admin\CategoryRepository;
use App\Repositories\Eloquent\Admin\LabelRepository;
use App\Transform\ArticleTransform;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
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
     * @var \App\Transform\ArticleTransform
     */
    private $transform;

    /**
     * ArticleController constructor.
     *
     * @param CategoryRepository $categoryRepository
     * @param ArticleRepository $articleRepository
     * @param LabelRepository $labelRepository
     * @param ArticleTransform $articleTransform
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ArticleRepository $articleRepository,
        LabelRepository $labelRepository,
        ArticleTransform $articleTransform
    )
    {
        $this->articleModel = $articleRepository;
        $this->cateModel    = $categoryRepository;
        $this->labelModel   = $labelRepository;
        $this->transform    = $articleTransform;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index');
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
     * @param  ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $result = $this->articleModel->createArticle($request);
        if ($result) {
            flash('添加文章成功', 'success');
        } else {
            flash('添加文章失败', 'error')->important();
        }

        return redirect('admin/article');
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
     * 获取文章列表
     * @return mixed
     * @author wuliang
     */
    public function ajaxGetArticleList ()
    {
        $draw = request('draw', 1);
        $article = $this->articleModel->getArticleList();
        return response()->json([
            'draw' => $draw,
            'recordsTotal' => 10,
            'recordsFiltered' => 10,
            'data' => $this->transform->transformCollection($article),
        ]);
    }

    /**
     * markdown 编辑器中的图片上传
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @author wuliang
     */
    public function upload (Request $request)
    {
        $path = $this->articleModel->upload($request);
        if ($path) {
            $result = ['success' => 1, 'message' => '上传成功', 'url' => $path];
        } else {
            $result = ['success' => 0, 'message' => '上传失败'];
        }
        return response()->json($result);
    }
}
