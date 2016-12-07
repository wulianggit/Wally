<?php

namespace app\Repositories\Eloquent\Frontend;


use App\Models\Category;
use App\Repositories\Eloquent\Repository;

class NavRepository extends Repository
{
    public function model()
    {
        return Category::class;
    }

    /**
     * 获取导航
     * @return array
     * @author wuliang
     */
    public function getNavsList ()
    {
        $navsList = $this->model->where('status',1)->orderBy('sort', 'desc')->get()->toArray();
        if (!empty($navsList))
        {
            $navsList = $this->unlimitedForChild($navsList);
            // 对子级分类按排序字段排序
            foreach ($navsList as $key => &$val)
            {
                if ($val['child']) {
                    $sort = array_column($val['child'], 'sort');
                    array_multisort($val['child'], SORT_DESC, $sort);
                }
            }
        }
        
        return $navsList;
    }

    /**
     * 处理导航
     * @param     $navs
     * @param int $pid
     *
     * @return array
     * @author wuliang
     */
    private function unlimitedForChild ($navs, $pid = 0)
    {
        $categoryList = [];

        foreach ($navs as $key => $val)
        {
            if ($pid == $val['pid']) {
                $categoryList[$key]['id']   = $val['id'];
                $categoryList[$key]['name'] = $val['name'];
                $categoryList[$key]['sort'] = $val['sort'];
                $categoryList[$key]['child'] = self::unlimitedForChild($navs, $val['id']);
            }
        }

        return $categoryList;
    }
}
