<?php

namespace App\Repositories\Eloquent\Admin;

use App\Models\Category;
use App\Repositories\Eloquent\Repository;

class CategoryRepository extends Repository
{
    /**
     * 返回分类 Model 模型的名称
     * @return mixed
     * @author wuliang
     */
    public function model()
    {
        return Category::class;
    }
}
