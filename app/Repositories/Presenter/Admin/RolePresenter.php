<?php

namespace App\Repositories\Presenter\Admin;


class RolePresenter
{
    /**
     * @param $permissions
     *
     * @return string
     * @author wuliang
     */
    public function handlePermission ($permissions)
    {
        $html = "";
        foreach($permissions as $key => $permission)
        {
            $html .= "<div class='app'>
                        <p>
                            <strong>".trans('label.model.'.$key)."</strong>
                            <input type='checkbox' level='1' value='0'>
                        </p>
                        <dl>";
            $html .= $this->handleAccess($permission);
            $html .= "</dl></div>";
        }

        return $html;
    }

    /**
     * @param $permission
     *
     * @return string
     * @author wuliang
     */
    public function handleAccess($permission)
    {
        $access = "";
        foreach ($permission as $val)
        {
            $access .= "<dt>
                           <strong>".$val['displayName']."</strong>
                           <input type='checkbox' name='permission[]' value=".$val['id'].">
                       </dt>";
        }
        return $access;
    }
}
