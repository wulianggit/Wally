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

    /**
     * 获取文章分类
     *
     * @return array
     * @author wuliang
     */
    public function getCateList ()
    {
        $categoryList = [];
        $categories = $this->model->where('status', 1)->orderBy('sort', 'desc')->get()->toArray();

        if (!empty($categories))
        {
            $categoryList = $this->unlimitedForChild($categories);
            // 对子级分类按排序字段排序
            foreach ($categoryList as $key => &$val)
            {
                if ($val['child']) {
                    $sort = array_column($val['child'], 'sort');
                    array_multisort($val['child'], SORT_DESC, $sort);
                }
            }
        }

        return $categoryList;
    }

    /**
     * 递归处理文章分类
     *
     * @param     $cates
     * @param int $pid
     *
     * @return array
     * @author wuliang
     */
    private function unlimitedForChild ($cates, $pid = 0)
    {
        $categoryList = [];

        foreach ($cates as $key => $val)
        {
            if ($pid == $val['pid']) {
                $categoryList[$key]['id']   = $val['id'];
                $categoryList[$key]['name'] = $val['name'];
                $categoryList[$key]['sort'] = $val['sort'];
                $categoryList[$key]['child'] = self::unlimitedForChild($cates, $val['id']);
            }
        }

        return $categoryList;
    }
}
