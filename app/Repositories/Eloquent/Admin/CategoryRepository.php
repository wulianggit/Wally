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
                $categoryList[$key]['pid']  = $val['pid'];
                $categoryList[$key]['name'] = $val['name'];
                $categoryList[$key]['sort'] = $val['sort'];
                $categoryList[$key]['child'] = self::unlimitedForChild($cates, $val['id']);
            }
        }

        return $categoryList;
    }

    /**
     * 获取修改分类信息
     *
     * @param $id
     *
     * @return array
     * @author wuliang
     */
    public function editCategory ($id)
    {
        $field = ['id', 'pid', 'name', 'sort'];
        $categoryData = $this->model->find($id, $field)->toArray();
        if ($categoryData) {
            $categoryData['status'] = 'success';
            $categoryData['update'] = url('admin/category/'.$id);
            return $categoryData;
        }

        return ['status' => 'error', 'msg' => trans('alert.loading.error')];
    }

    /**
     * 更新分类
     * @param $request
     *
     * @return bool
     * @author wuliang
     */
    public function updateCategory ($request)
    {
        $category = $this->model->find($request->id);

        if ($category)
        {
            $result = $category->update($request->all());
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        abort(trans('alert.category.not_exists'));
    }

    /**
     * 删除分类
     * @param $id
     *
     * @return bool
     * @author wuliang
     */
    public function destoryCategory ($id)
    {
        $category = $this->model->find($id);

        if ($category)
        {
            $result = $this->model->where('id',$id)->update(['status'=>0]);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        abort(trans('alert.category.not_exists'));
    }
}
