<?php

namespace App\Http\ViewComposers;


use App\Repositories\Eloquent\Frontend\NavRepository;
use Illuminate\Contracts\View\View;

class FrontendComposer
{
    /**
     * 前台导航条仓库实现
     * @var \App\Repositories\Eloquent\Frontend\NavRepository
     */
    protected $nav;

    /**
     * FrontendComposer constructor.
     *
     * @param NavRepository $nav
     */
    public function __construct(NavRepository $nav)
    {
        $this->nav = $nav;
    }

    /**
     * 绑定数据到视图
     *
     * @param View $view
     *
     * @author wuliang
     */
    public function compose (View $view)
    {
        $view->with('navs', $this->nav->getNavsList());
    }
}
