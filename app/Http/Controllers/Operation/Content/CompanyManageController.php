<?php

namespace App\Http\Controllers\Operation\Content;

use App\Http\Controllers\Controller;
use App\Models\CompanyManage\PageContent;
use App\Models\CountryAndShippingFee\Language;
use App\Services\Operate\PageContentService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyManageController extends Controller
{
    public function __construct(
        protected Request $request,
        protected PageContent $oModel,
        protected PageContentService $pageContentService
    ) {
    }

    public function pageContentHtml($companyKey)
    {
        $check = $this->pageContentService->checkKey($companyKey);
        $permKey = Str::of($companyKey)->camel();
        if (!$check) {
            return abort(404);
        }

        if (!auth('operate')->user()->can($permKey . '_read')) {
            return abort(403);
        }

        $language = new Language();
        $langTypeKeys = array_keys($language->langTypeText);
        foreach ($langTypeKeys as $langType) {
            $this->oModel->firstOrCreate([
                'slug' => $companyKey,
                'lang_type' => $langType,
            ], [
                'page_name' => $companyKey,
            ]);
        }
        $datas = $this->oModel->where('slug', $companyKey)->get();

        return view('operate/pages/company_manage/page_content', [
            'langTypeText' => $language->langTypeText,
            'datas' => $datas,
            'key' => $permKey,
        ]);
    }

    /**
     * 修改內容
     */
    public function saveContent($pageContentSlug)
    {
    }

    /**
     * 修改草稿
     */
    public function saveDraft($pageContentSlug)
    {
        $check = $this->pageContentService->checkKey($pageContentSlug);
        if (!$check) {
            return abort(404);
        }
        $permKey = Str::of($pageContentSlug)->camel();
        if (!auth('operate')->user()->can($permKey . '_update')) {
            return abort(403);
        }

        $ids = $this->request->get('ids');
        $editors = $this->request->get('editors');
        foreach ($ids as $key => $id) {
            $this->oModel->where('id', $id)->update([
                'draft' => $editors[$key],
            ]);
        }

        // $pageContentSlug

        // 回傳前台預覽網址。
        return [
            'urls' => [],
        ];
    }

    public function pageContent($companyKey)
    {
        $check = $this->pageContentService->checkKey($companyKey);
        if (!$check) {
            return abort(404);
        }

        $permKey = Str::of($companyKey)->camel();
        if (!auth('operate')->user()->can($permKey . '_update')) {
            return abort(403);
        }

        $ids = $this->request->get('ids');
        $editors = $this->request->get('editors');
        $seoArray = $this->request->get('seo_title');
        $seoKeywordsArr = $this->request->get('seo_keywords');
        $seoDesArr = $this->request->get('seo_description');

        foreach ($ids as $key => $id) {
            //修改內容並清空草稿
            $this->oModel->where('id', $id)->update([
                'content' => $editors[$key],
                'seo_title' => $seoArray[$key],
                'seo_keywords' => $seoKeywordsArr[$key],
                'seo_description' => $seoDesArr[$key],
                'draft' => '',
            ]);
        }

        return back()->with(['success' => __('修改成功')]);
    }
}
