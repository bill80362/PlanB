<?php

namespace App\Services\Operate;

class MenuService
{
    public function getMenu()
    {
        return [
            [
                'name' => __('儀表板'),
                'href' => '/operate/dashboard',
                'icon' => '/template/Salessa/img/menu-icon/dashboard.svg',
                'permission' => '',
            ],
            [
                'name' => __('管理人管理'),
                'icon' => '/template/Salessa/img/menu-icon/5.svg',
                'subMenu' => [
                    [
                        'name' => __('管理人管理'),
                        'href' => '/operate/user',
                        'permission' => '', //user.read
                    ],
                    [
                        'name' => __('群組管理'),
                        'href' => '/operate/permission_group',
                        'permission' => '', //permissionGroup.read
                    ],
                ],
            ],
            [
                'name' => __('系統設定'),
                'icon' => '/template/Salessa/img/menu-icon/5.svg',
                'subMenu' => [
                    [
                        'name' => __('語系管理'),
                        'href' => '/operate/language',
                        'permission' => 'language_read',
                    ],
                    [
                        'name' => __('系統環境設定'),
                        'href' => '/operate/system',
                        'permission' => 'system_update',
                    ],
                ],
            ],
            [
                'name' => __('公司管理'),
                'icon' => '',
                'subMenu' => [
                    [
                        'name' => __('隱私權聲明'),
                        'href' => '/operate/company_manage/privacy_statement',
                        'permission' => 'privacy_statement_read', //member.read
                    ],
                    [
                        'name' => __('版權宣告'),
                        'href' => '/operate/company_manage/copyright_notice',
                        'permission' => 'copyright_notice_read', //member.read
                    ],
                ],
            ],
            [
                'name' => __('Log'),
                'icon' => '',
                'subMenu' => [
                    [
                        'name' => __('abc公司串接Log'),
                        'href' => '/operate/http_log',
                        'permission' => '',
                    ],
                ],
            ],
            [
                'name' => __('操作紀錄'),
                'icon' => '',
                'subMenu' => [
                    [
                        'name' => __('操作紀錄'),
                        'href' => '/operate/audit',
                        'permission' => '', //member.read
                    ],
                ],
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
        $defaultIcon = $this->getDefaultMenuIcon();
        $userMenus = [];
        foreach ($menus as $menu) {
            if ((array_key_exists('subMenu', $menu))) {
                if ($this->checkSubMenuPermission($menu['subMenu'], $user)) {
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

    public function checkSubMenuPermission($subMenus, $user)
    {
        foreach ($subMenus as $subMenu) {
            if ($subMenu['permission'] == '' || $user->can($subMenu['permission'])) {
                return true;
            }
        }

        return false;
    }

    public function getDefaultMenuIcon()
    {
        return '/template/Salessa/img/menu-icon/dashboard.svg';
    }
}
