<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Eloquent\Frontend\ArticleRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 文章仓库实现
     * @var \App\Repositories\Eloquent\Frontend\ArticleRepository
     */
    private $article;
    /**
     * Create a new controller instance.
     * @param ArticleRepository $article
     */
    public function __construct(ArticleRepository $article)
    {
        //$this->middleware('auth');
        $this->article = $article;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->article->getArticlesList();
        return view('frontend.list')->with(compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @author wuliang
     */
    public function show($id)
    {
        $article = $this->article->getArticleContentById($id);
        //dd($article);
        return view('frontend.detail')->with(compact('article'));
    }
}
