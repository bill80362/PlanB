<?php

namespace App\Services\Operate;

class PermService
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
    public function getPermList()
    {
        $allPerm = [
            [
                'groupName' => __('會員管理群組'),
                'permissions' => $this->getMemberGroup(),
            ],
            [
                'groupName' => __('商品管理群組'),
                'permissions' => $this->getProductGroup(),
            ],
            [
                'groupName' => __('系統管理群組'),
                'permissions' => $this->getSystemGroup(),
            ],
        ];

        foreach ($allPerm as $key => $perm) {
            $allPerm[$key]['permissions'] = $this->changeActions($perm['permissions']);
        }

        return $allPerm;
    }

    /**
     * 取得所有權限
     */
    public function getActions()
    {
        $permList = $this->getPermList();
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
    private function getMemberGroup()
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

    private function getProductGroup()
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
    private function getSystemGroup()
    {
        return [
            [
                'label' => __('權限管理'),
                'groupKey' => 'perm',
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
