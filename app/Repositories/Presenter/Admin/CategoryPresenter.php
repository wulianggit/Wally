<?php

namespace app\Repositories\Presenter\Admin;


class CategoryPresenter
{
    /**
     * 处理顶级分类
     *
     * @param array $cates
     *
     * @return string
     * @author wuliang
     */
    public function getTopCate ($cates)
    {
        $option = "<option value='0'>顶级分类</option>";

        if (!empty($cates)) {
            foreach ($cates as $cate)
            {
                $option .= "<option value='{$cate['id']}'>{$cate['name']}</option>";
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
                    <div class='dd3-content'>{$category['name']}</div>";

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
}
