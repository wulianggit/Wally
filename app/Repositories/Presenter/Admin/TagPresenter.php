<?php
namespace App\Repositories\Presenter\Admin;


class TagPresenter
{
    /**
     * 处理标签下拉选项
     * @param $labels
     *
     * @return string
     * @author wuliang
     */
    public function tagSelectOption ($labels)
    {
        $option = "<option value='0'>请选择文章标签</option>";

        if (!empty($labels)) {
            foreach ($labels as $key => $label)
            {
                $option .= "<option value='{$label['id']}'>{$label['name']}</option>";
            }
        }

        return $option;
    }


    /**
     * 处理标签列表
     * @param $tags
     *
     * @return string
     * @author wuliang
     */
    public function getTagList($tags)
    {
        if ($tags) {
            $item = '';
            foreach ($tags as $key => $tag)
            {
                $item .= "<li class='dd-item dd3-item' data-id='{$tag['id']}'>
                    <div class='dd-handle dd3-handle'></div>
                    <div class='dd3-content'>{$tag['name']}";

                // 拼接操作按钮
                $item .= $this->getOpeatorButton($tag['id']);
                $item .= "</div></li>";
            }
            return $item;
        }

        return '暂无标签';
    }


    /**
     * 标签操作按钮 [增 删 改]
     * @param     $tagId
     *
     * @return string
     * @author wuliang
     */
    private function getOpeatorButton ($tagId)
    {
        $operatorButon = "<div class='pull-right action-buttons'>";

        // 编辑标签
        $editUrl = url("admin/tag/{$tagId}/edit");
        $operatorButon .= "<a href='javascript:;' data-href='{$editUrl}' class='btn-xs editTag'
            data-toggle='tooltips' data-original-title='".trans('curd.update')."' data-placement='top'>
            <i class='fa fa-pencil'></i></a>";

        // 删除标签
        $deleteUrl = url("admin/tag", [$tagId]);
        $token     = csrf_token();
        $operatorButon .= "<a href='javacsript:;' data-id='{$tagId}' class='btn-xs destoryTag'
            data-toggle='tooltips' data-original-title='".trans('curd.delete')."' data-placement='top'>    
            <i class='fa fa-trash'></i>
            <form action='{$deleteUrl}' method='post' name='delete_tag_{$tagId}' style='display: none'>
                <input type='hidden' name='_method' value='DELETE'>
                <input type='hidden' name='_token' value='{$token}'>
            </form></a>";

        $operatorButon .= "</div>";

        return $operatorButon;
    }
}
