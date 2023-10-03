<?php

namespace App\Http\Controllers\Operation;

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
                'key' => $companyKey,
                'lang_type' => $langType,
            ], [
                'page_name' => $companyKey,
            ]);
        }
        $datas = $this->oModel->where('key', $companyKey)->get();

        return view('operate/pages/company_manage/page_content', [
            'langTypeText' => $language->langTypeText,
            'datas' => $datas,
            'key' => $permKey,
        ]);
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
        foreach ($ids as $key => $id) {
            $this->oModel->where('id', $id)->update([
                'content' => $editors[$key],
            ]);
        }

        return back()->with(['message' => __('修改成功')]);
    }
}
