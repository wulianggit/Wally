<?php

namespace App\Repositories\Eloquent\Admin;


use App\Models\Article;
use App\Repositories\Eloquent\Repository;

class ArticleRepository extends Repository
{

    public function model()
    {
        return Article::class;
    }
}
