<?php

namespace App\Services\Operate;

use Illuminate\Support\Facades\Request;

class MenuService
{
    public function getMenu()
    {
        // 請勿刪除此行註解，stub產生放置位置，請將產生出來的註解程式移至下方程式並移除註解。
        
        $menus = [
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
                        'permission' => 'user_read',
                    ],
                    [
                        'name' => __('權限模板'),
                        'href' => '/operate/permission_group',
                        'permission' => 'permissionGroup_read',
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
                        'name' => __('內容管理列表'),
                        'href' => '/operate/page_content',
                        'permission' => 'pageContent_read',
                    ],
                ],
            ],
            [
                'name' => __('檔案管理'),
                'icon' => '',
                'subMenu' => [
                    [
                        'name' => __('檔案管理'),
                        'href' => '/operate/file_upload/list',
                        'permission' => '',
                    ],
                ],
            ],
            [
                'name' => __('紀錄管理'),
                'icon' => '',
                'subMenu' => [
                    [
                        'name' => __('操作紀錄'),
                        'href' => '/operate/audit',
                        'permission' => 'audit_read',
                    ],
                    [
                        'name' => __('串接紀錄'),
                        'href' => '/operate/http_log',
                        'permission' => '',
                    ],
                ],
            ],


        ];

        if (!app()->isProduction()) {
            $templates = [
                'name' => __('範本'),
                'icon' => '/template/Salessa/img/menu-icon/5.svg',
                'subMenu' => [
                    [
                        'name' => __('列表頁-範本'),
                        'href' => '/operate/template/list',
                        'permission' => '',
                    ],
                    [
                        'name' => __('詳細頁'),
                        'href' => '/operate/template/detail',
                        'permission' => '',
                    ],
                ]
            ];
            $menus = array_merge($menus, [$templates]);
        }




        return $menus;
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

    /**
     * 取得現在menu路由(包含上層選單)
     */
    public function getCurrentMenu(): array
    {
        $currentPath = "/" . Request::path();
        $userMenus = $this->userMenu();
        $path  = [];
        foreach ($userMenus as $menu) {
            if (array_key_exists('subMenu', $menu)) {
                foreach ($menu['subMenu'] as $subMenu) {
                    if ($currentPath == $subMenu['href']) {
                        array_push($path, $menu);
                        array_push($path, $subMenu);
                        return $path;
                    }
                }
            } else {
                if ($currentPath == $menu['href']) {
                    array_push($path, $menu);
                    return $path;
                }
            }
        }
        return $path;
    }

    /**
     * 取得目前麵包屑
     *
     */
    public function getCurrentBreadCrumbs()
    {
        $currentMenus = $this->getCurrentMenu();
        $result = collect($currentMenus)->map(function ($item) {
            return $item['name'];
        })->toArray();
        return $result;
    }

    /**
     * 取得目前菜單
     */
    public function getCurrentLastMenu()
    {
        $currentMenus = $this->getCurrentMenu();
        if (count($currentMenus) > 0) {
            return last($currentMenus);
        }
        return [
            'name' => ''
        ];
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
