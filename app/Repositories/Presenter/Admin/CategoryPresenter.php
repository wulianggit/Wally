<?php

namespace app\Repositories\Presenter\Admin;


class CategoryPresenter
{
    /**
     * 处理文章分类
     *
     * @param array $cates [分类数据]
     * @param bool  $isTop [是否仅为顶级分类]
     *
     * @return string
     * @author wuliang
     */
    public function getTopCate ($cates, $isTop = true)
    {
        if ($isTop) {
            $option = "<option value='0'>顶级分类</option>";
        } else {
            $option = "<option value='0'>请选择文章分类</option>";
        }

        if (!empty($cates)) {
            foreach ($cates as $key => $cate)
            {
                $option .= "<option value='{$cate['id']}'>{$cate['name']}</option>";
                if (isset($cate['child']) && !$isTop) {
                    foreach ($cate['child'] as $child)
                    {
                        $option .= "<option value='{$child['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;{$child['name']}</option>";
                    }
                }
            }
        }

        return $option;
    }


    /**
     * 处理分类列表
     *
     * @param $categoryList
     *
     * @return string
     * @author wuliang
     */
    public function handleCategoryList ($categoryList)
    {
        if ($categoryList) {
            $item = '';
            foreach ($categoryList as $key => $val)
            {
                $item .= $this->handleTopCategory($val);
            }

            return $item;
        }

        return '暂无文章分类!';
    }

    /**
     * 处理顶级分类
     *
     * @param $category
     * @return string
     * @author wuliang
     */
    private function handleTopCategory($category)
    {
        $item = "<li class='dd-item dd3-item' data-id='{$category['id']}'>
                    <div class='dd-handle dd3-handle'></div>
                    <div class='dd3-content'>{$category['name']}";

        // 拼接操作按钮
        $topCategory = false;
        if ($category['pid'] == 0)
            $topCategory = true;
        $item .= $this->getOpeatorButton($category['id'], $topCategory);
        $item .= "</div>";
        // 拼接子级分类
        if ($category['child']) {
            $item .= $this->handleChildCategory($category['child']);
        }

        $item .= "</li>";

        return $item;
    }

    /**
     * 处理子级分类
     *
     * @param $childCategory
     *
     * @return string
     * @author wuliang
     */
    private function handleChildCategory ($childCategory)
    {
        $childItem = "<ol class='dd-list'>";

        foreach ($childCategory as $key => $val)
        {
            $childItem .= $this->handleTopCategory($val);
        }

        $childItem .= "</ol>";

        return $childItem;
    }

    /**
     * 分类操作按钮 [增 删 改]
     * @param      $categoryId
     * @param bool $topCategory
     *
     * @return string
     * @author wuliang
     */
    private function getOpeatorButton ($categoryId, $topCategory = false)
    {
        $operatorButon = "<div class='pull-right action-buttons'>";

        // 添加子级分类 只有顶级分类才可以添加
        $addUrl = url("admin/category");
        if ($topCategory) {
            $operatorButon .= "<a href='javascript:;' data-pid='{$categoryId}' data-href='{$addUrl}' 
                 class='btn-xs createCate' data-toggle='tooltips' data-original-title='添加子分类' 
                 data-placement='top'><i class='fa fa-plus'></i></a>";
        }
        // 编辑分类
        $editUrl = url("admin/category/{$categoryId}/edit");
        $operatorButon .= "<a href='javascript:;' data-href='{$editUrl}' class='btn-xs editCate'
            data-toggle='tooltips' data-original-title='".trans('curd.update')."' data-placement='top'>
            <i class='fa fa-pencil'></i></a>";

        // 删除分类
        $deleteUrl = url("admin/category", [$categoryId]);
        $token     = csrf_token();
        $operatorButon .= "<a href='javacsript:;' data-id='{$categoryId}' class='btn-xs destoryCate'
            data-toggle='tooltips' data-original-title='".trans('curd.delete')."' data-placement='top'>    
            <i class='fa fa-trash'></i>
            <form action='{$deleteUrl}' method='post' name='delete_cate_{$categoryId}' style='display: none'>
                <input type='hidden' name='_method' value='DELETE'>
                <input type='hidden' name='_token' value='{$token}'>
            </form></a>";

        $operatorButon .= "</div>";

        return $operatorButon;
    }
}
