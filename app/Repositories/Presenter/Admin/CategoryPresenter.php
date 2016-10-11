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
}
