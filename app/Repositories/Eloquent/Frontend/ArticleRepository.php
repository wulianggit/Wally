<?php

namespace App\Repositories\Eloquent\Frontend;


use App\Models\Article;
use App\Repositories\Eloquent\Repository;

class ArticleRepository extends Repository
{
    public function model()
    {
        return Article::class;
    }

    /**
     * 获取文章列表
     * @return mixed
     * @author wuliang
     */
    public function getArticlesList ()
    {
        $articles = $this->model->orderBy('created_at','desc')->get(['id','title','introduce', 'img_path'])->toArray();
        return $articles;
    }

    /**
     * 获取文章详情
     * @param $id
     *
     * @return mixed
     * @author wuliang
     */
    public function getArticleContentById ($id)
    {
        $article = $this->model->where('id',$id)->first()->toArray();
        return $article;
    }
}
