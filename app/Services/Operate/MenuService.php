<?php

namespace App\Services\Operate;

use App\Models;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MenuService
{

    public function getMenu()
    {
        return [
            [
                'name' => __('儀表板'),
                'href' => '/operate',
                'icon' => '/template/Salessa/img/menu-icon/dashboard.svg',
                'permission' => ''
            ],
            [
                'name' => '管理人管理',
                'icon' => '/template/Salessa/img/menu-icon/5.svg',
                'subMenu' => [
                    [
                        'name' => __('管理人管理'),
                        'href' => '/operate/user',
                        'permission' => '' //user.read
                    ],
                    [
                        'name' => __('群組管理'),
                        'href' => '/operate/Permission_Group',
                        'permission' => '' //permissionGroup.read
                    ],
                ]
            ],
            [
                'name' => '會員管理',
                'icon' => '',
                'subMenu' => [
                    [
                        'name' => __('會員資料'),
                        'href' => '/operate/Member_Data',
                        'permission' => '' //member.read
                    ],
                    [
                        'name' => __('會員等級'),
                        'href' => '/operate/Member_Level',
                        'permission' => 'memberLevel.read'
                    ],
                ]
            ],
        ];
    }

    public function checkSubMenuPermission($subMenus)
    {
        foreach ($subMenus as $subMenu) {
            if ($subMenu['permission'] == '' || Gate::allows($subMenu['permission'])) {
                return true;
            }
        }
        return false;
    }

    public function getDefaultMenuIcon()
    {
        return "/template/Salessa/img/menu-icon/dashboard.svg";
    }
}
