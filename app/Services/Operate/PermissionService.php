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
            'read' => __('讀取'),
            'create' => __('新增'),
            'update' => __('修改'),
            'delete' => __('刪除'),
            'export' => __('匯出'),
            'import' => __('匯入'),
            'print' => __('列印'),
        ];
    }

    /**
     * 定義權限群組，要加權限或刪除在此處修改。
     */
    public function getGroupItemPermission()
    {
        $groups = [
            [
                'groupName' => __('會員管理群組'),
                'permissions' => $this->getMemberItem(),
            ],
            [
                'groupName' => __('商品管理群組'),
                'permissions' => $this->getProductItem(),
            ],
            [
                'groupName' => __('系統管理群組'),
                'permissions' => $this->getSystemItem(),
            ],
        ];

        foreach ($groups as $key => $group) {
            $groups[$key]['permissions'] = $this->changeActions($group['permissions']);
        }

        return $groups;
    }

    /**
     * 取得所有權限
     */
    public function getPermissions()
    {
        $permList = $this->getGroupItemPermission();
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
                'label' => __('會員等級'),
                'groupKey' => 'memberLevel',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import']
            ],
            [
                'label' => __('會員管理'),
                'groupKey' => 'member',
                'actions' => ['read', 'create', 'update', 'delete']
            ],
        ];
    }

    private function getProductItem()
    {
        return [
            [
                'label' => __('商品分店'),
                'groupKey' => 'prodMall',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import']
            ],
            [
                'label' => __('商品分館'),
                'groupKey' => 'prodLib',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import']
            ],
        ];
    }

    // 系統管理群組
    private function getSystemItem()
    {
        return [
            [
                'label' => __('群組管理'),
                'groupKey' => 'permissionGroup',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import']
            ],
            [
                'label' => __('後台使用者管理'),
                'groupKey' => 'user',
                'actions' => ['read', 'create', 'update', 'delete']
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
                    'group' => $perm['label'],
                    'label' => $perm['label'] . '-' . $defineAction[$act],
                    'key' => $perm['groupKey'] . '.' . $act,
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
