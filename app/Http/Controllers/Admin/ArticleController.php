<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\Admin\ArticleRepository;
use App\Repositories\Eloquent\Admin\CategoryRepository;
use App\Repositories\Eloquent\Admin\TagRepository;
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
     * @var \App\Repositories\Eloquent\Admin\TagRepository
     */
    private $tagModel;

    /**
     * @var \App\Transform\ArticleTransform
     */
    private $transform;

    /**
     * ArticleController constructor.
     *
     * @param CategoryRepository $categoryRepository
     * @param ArticleRepository $articleRepository
     * @param TagRepository $tagRepository
     * @param ArticleTransform $articleTransform
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ArticleRepository $articleRepository,
        TagRepository $tagRepository,
        ArticleTransform $articleTransform
    )
    {
        $this->articleModel = $articleRepository;
        $this->cateModel    = $categoryRepository;
        $this->tagModel     = $tagRepository;
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
        $tagList    = $this->tagModel->getTagList();
        return view('admin.article.create')->with(compact('categoryList', 'tagList'));
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
            flash(trans('alert.article.create_success'), 'success');
        } else {
            flash(trans('alert.article.create_error'), 'error')->important();
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
            $result = ['success' => 1, 'message' => trans('alert.article.upload_success'), 'url' => $path];
        } else {
            $result = ['success' => 0, 'message' => trans('alert.article.upload_error')];
        }
        return response()->json($result);
    }
}
