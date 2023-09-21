<?php

namespace App\Services\Operate;

use App\Models\CompanyManage\PageContent;


class PageContentService
{

    public function __construct()
    {
    }

    /**
     * 定義需與權限字串相符
     */
    public function keys()
    {
        return [
            'privacy_statement', // 隱私權聲明
            'copyright_notice', // 版權宣告 
        ];
    }

    public function checkKey($key)
    {
        return in_array($key, $this->keys());
    }
}
