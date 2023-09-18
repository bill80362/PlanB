<?php

namespace App\Services\Operate;

use Illuminate\Support\Facades\Gate;

class MenuService
{

    public function getMenu()
    {
        return [
            [
                'name' => __('儀表板'),
                'href' => '/operate/dashboard',
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
                        'href' => '/operate/permission_group',
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
                        'href' => '/operate/member_data',
                        'permission' => '' //member.read
                    ],
                    [
                        'name' => __('會員等級'),
                        'href' => '/operate/member_level',
                        'permission' => 'memberLevel.read'
                    ],
                ]
            ],
        ];
    }

     /**
     * 取得使用者有權限的選單
     */
    public function userMenu()
    {
        $user = auth('operate')->user();
        $menus = $this->getMenu();
        $defaultIcon =  $this->getDefaultMenuIcon();
        $userMenus = [];
        foreach ($menus as $menu) {
            if ((array_key_exists('subMenu', $menu))) {
                if ($this->checkSubMenuPermission($menu['subMenu'])) {
                    // array_push($userMenus, $menu);
                    $userSubMenus = [];
                    foreach ($menu['subMenu'] as $subMenu) {
                        if (($subMenu['permission'] == '' || $user->can($subMenu['permission']))) {
                            array_push($userSubMenus, $subMenu);
                        }
                    }
                    $menu['subMenu'] = $userSubMenus;
                    $menu['icon'] = $menu['icon'] ?: $defaultIcon;
                    array_push($userMenus, $menu);
                }
            } else {
                if (($menu['permission'] == '' || $user->can($menu['permission']))) {
                    $menu['icon'] = $menu['icon'] ?: $defaultIcon;
                    array_push($userMenus, $menu);
                }
            }
        }

        return $userMenus;
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
