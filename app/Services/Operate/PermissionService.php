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

            // ---------收信權限---------
            // 'newOrder' => '新訂單通知',
            // 'orderShipped' => '到貨通知',
            // 'refund' => '退款通知',
            // 'register' => '會員註冊',

        ];
    }

    /**
     * 定義權限群組，要加權限或刪除在此處修改。
     */
    public function getGroupItemPermission($lv = null)
    {
        // 請勿刪除此行註解，stub產生放置位置，請將產生出來的註解程式移至下方程式並移除註解。

        $newGroup = [];
        $groups = [
            [
                'groupName' => '會員管理群組',
                'allowLv' => [1, 2, 3, 4],
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
            // [
            //     'groupName' => '收信功能',
            //     'allowLv' => [1, 2, 3, 4],
            //     'permissions' => $this->getReciveMail(),
            // ],


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
            [
                'label' => '會員管理_通訊錄',
                'groupKey' => 'memberAddress',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '會員管理_VIP紀錄',
                'groupKey' => 'memberVIPRecord',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '會員標籤',
                'groupKey' => 'memberTag',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '會員內部備註辭庫',
                'groupKey' => 'memberRemark',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '會員外部升等金額',
                'groupKey' => 'externalPoints',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '黑名單',
                'groupKey' => 'memberBlack',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '訂閱電子報',
                'groupKey' => 'newsletter',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
            [
                'label' => '退貨保留款',
                'groupKey' => 'memberMoney',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
            [
                'label' => '退貨保留款-申請退款',
                'groupKey' => 'moneyRet',
                'actions' => ['read', 'update', 'delete'],
            ],
            [
                'label' => '貨到通知',
                'groupKey' => 'prodInform',
                'actions' => ['read',  'delete'],
            ],
            [
                'label' => '認識管道',
                'groupKey' => 'understandPipeline',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '認識管道_細項',
                'groupKey' => 'understandPipelineDetail',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '職業管理',
                'groupKey' => 'careerManagement',
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
                'label' => '內容管理列表',
                'groupKey' => 'pageContent',
                'actions' => ['read', 'update'],
            ],
        ];
    }

    // 系統管理群組
    private function getSystemItem()
    {
        return [
            [
                'label' => '權限模板',
                'groupKey' => 'permissionGroup',
                'actions' => ['read', 'create', 'update', 'delete'],
            ],
            [
                'label' => '管理人管理',
                'groupKey' => 'user',
                'actions' => ['read', 'create', 'update', 'delete', 'export', 'import'],
            ],
            [
                'label' => '操作紀錄',
                'groupKey' => 'audit',
                'actions' => ['read'],
            ],
            [
                'label' => '系統環境',
                'groupKey' => 'system',
                'actions' => ['update'],
            ],
        ];
    }

    private function getReciveMail()
    {
        return [
            [
                'label' => '訂單信件',
                'groupKey' => 'mailOrder',
                'actions' => ['newOrder', 'orderShipped', 'refund'],
            ],
            [
                'label' => '會員信件',
                'groupKey' => 'mailMember',
                'actions' => ['register'],
            ]
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
