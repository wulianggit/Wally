<?php
namespace App\Repositories\Presenter\Admin;


class LabelPresenter
{
    /**
     * 处理标签列表
     * @param $labels
     *
     * @return string
     * @author wuliang
     */
    public function getLabelList($labels)
    {
        if ($labels) {
            $item = '';
            foreach ($labels as $key => $label)
            {
                $item .= "<li class='dd-item dd3-item' data-id='{$label['id']}'>
                    <div class='dd-handle dd3-handle'></div>
                    <div class='dd3-content'>{$label['name']}";

                // 拼接操作按钮
                $item .= $this->getOpeatorButton($label['id']);
                $item .= "</div></li>";
            }
            return $item;
        }

        return '暂无标签';
    }


    /**
     * 标签操作按钮 [增 删 改]
     * @param     $labelId
     *
     * @return string
     * @author wuliang
     */
    private function getOpeatorButton ($labelId)
    {
        $operatorButon = "<div class='pull-right action-buttons'>";

        // 编辑标签
        $editUrl = url("admin/label/{$labelId}/edit");
        $operatorButon .= "<a href='javascript:;' data-href='{$editUrl}' class='btn-xs editLabel'
            data-toggle='tooltips' data-original-title='修改标签' data-placement='top'>
            <i class='fa fa-pencil'></i></a>";

        // 删除标签
        $deleteUrl = url("admin/label", [$labelId]);
        $token     = csrf_token();
        $operatorButon .= "<a href='javacsript:;' data-id='{$labelId}' class='btn-xs destoryLabel'
            data-toggle='tooltips' data-original-title='删除标签' data-placement='top'>    
            <i class='fa fa-trash'></i>
            <form action='{$deleteUrl}' method='post' name='delete_label_{$labelId}' style='display: none'>
                <input type='hidden' name='_method' value='DELETE'>
                <input type='hidden' name='_token' value='{$token}'>
            </form></a>";

        $operatorButon .= "</div>";

        return $operatorButon;
    }
}
