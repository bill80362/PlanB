<?php

namespace App\Services\Operate;

class PermissionService
{
    /**
     * 定義操作種類
     */
    public function getDefineAction()
    {
        return [
            'read' => '讀取',
            'create' => '新增',
            'update' => '修改',
            'delete' => '刪除',
            'export' => '匯出',
            'import' => '匯入',
            'print' => '列印',
        ];
    }

    public array $lvText = [
        1 => '超級使用者',
        2 => '工程師',
        3 => 'PM',
        4 => '網址管理者',
        5 => '使用者',
    ];


    /**
     * 定義權限群組，要加權限或刪除在此處修改。
     */
    public function getGroupItemPermission($lv = null)
    {
        $newGroup = [];
        $groups = [
            [
                'groupName' => '會員管理群組',
                'allowLv' => [1, 2, 3, 4, 5],
                'permissions' => $this->getMemberItem(),
            ],
            [
                'groupName' => '商品管理群組',
                'allowLv' => [1, 2, 3, 4],
                'permissions' => $this->getProductItem(),
            ],
            [
                'groupName' => '國家&運費設定',
                'allowLv' => [1, 2, 3, 4],
                'permissions' => $this->getCountryAndShippingFee(),
            ],
            [
                'groupName' => '公司管理',
                'allowLv' => [1, 2, 3, 4],
                'permissions' => $this->getCompanyManage(),
            ],
            [
                'groupName' => '系統管理群組',
                'allowLv' => [1, 2, 3],
                'permissions' => $this->getSystemItem(),
            ],
        ];

        foreach ($groups as $key => $group) {
            $groups[$key]['permissions'] = $this->changeActions($group['permissions']);
            if ($lv) {
                if (in_array($lv, $group['allowLv'])) {
                    $newGroup[$key] =  $groups[$key];
                }
            } else {
                $newGroup[$key] =  $groups[$key];
            }
        }

        return $newGroup;
    }

    /**
     * 取得所有權限
     */
    public function getPermissions($lv = null)
    {
        $permList = $this->getGroupItemPermission($lv);
        $actions = collect($permList)->map(function ($item) {
            return $item['permissions'];
        })->flatten(1)
            ->values()
            ->flatMap(function ($item) {
                return $item['actions'];
            })->all();

        return $actions;
    }

    // 會員管理群組
    private function getMemberItem()
    {
        return [
            [
                'label' => '會員等級',
                'groupKey' => 'memberLevel',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
            [
                'label' => '會員管理',
                'groupKey' => 'member',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
        ];
    }

    private function getProductItem()
    {
        return [
            [
                'label' => '商品分店',
                'groupKey' => 'prodMall',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
            [
                'label' => '商品分館',
                'groupKey' => 'prodLib',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
        ];
    }

    //國家&運費設定
    private function getCountryAndShippingFee()
    {
        return [
            [
                'label' => '語系管理',
                'groupKey' => 'language',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
        ];
    }

    //公司管理
    private function getCompanyManage()
    {
        return [
            [
                'label' => '隱私權聲明',
                'groupKey' => 'privacy_statement',
                'actions' => ['read', 'update'],
            ],
            [
                'label' => '版權宣告 ',
                'groupKey' => 'copyright_notice',
                'actions' => ['read', 'update'],
            ],

        ];
    }

    // 系統管理群組
    private function getSystemItem()
    {
        return [
            [
                'label' => '群組管理',
                'groupKey' => 'permissionGroup',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
            [
                'label' => '管理人管理',
                'groupKey' => 'user',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
            [
                'label' => '系統環境',
                'groupKey' => 'system',
                'actions' => ['update'],
            ],
        ];
    }

    private function changeActions($permGroup)
    {
        $defineAction = $this->getDefineAction();
        $permList = $permGroup;
        foreach ($permList as $key => $perm) {
            $details = collect($perm['actions'])->map(function ($act) use ($perm, $defineAction) {
                return [
                    'label' => $defineAction[$act],
                    'key' => $perm['groupKey'] . '_' . $act,
                ];
            })->all();
            $permList[$key]['actions'] = [];
            foreach ($details as $detail) {
                array_push($permList[$key]['actions'], $detail);
            }
        }

        return $permList;
    }
}
