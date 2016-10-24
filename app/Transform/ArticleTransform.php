<?php

namespace App\Transform;


class ArticleTransform extends Transform
{

    public function transform($article)
    {
        return [
            'ID'           => $article['id'],
            'Title'        => $article['title'],
            'Category'     => $article['category']['name'],
            'AddTime'      => $article['created_at'],
            'UpdateTime'   => $article['updated_at'],
            'ActionButton' => '删除'
        ];
    }
}
