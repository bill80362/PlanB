<?php

namespace App\Http\Controllers\Operation\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\PageContent;
use App\Services\Operate\ListColumnService;
use Illuminate\Http\Request;
use App\Models\CountryAndShippingFee\Language;
use App\Services\Operate\PageContentService;

class PageContentController extends Controller
{
    public function __construct(
        protected Request $request,
        protected PageContent $oModel,
    ) {
    }

    // 列表頁
    public function listHTML(
        ListColumnService $listColumnService,
        PageContentService $pageContentService
    ) {
        $user = auth('operate')->user();
        // table設定，可用欄位
        $TableSetting = $listColumnService->getTableSetting($this->oModel);
        // 使用者設定
        $userColumns = $listColumnService->getWithUserId($this->oModel, $user->id);
        //根據使用者設定修改順序
        $TableSetting["canUseColumn"] = collect($TableSetting["canUseColumn"])->sortBy(function ($item, $key) use ($userColumns) {
            return array_search($item, $userColumns);
        })->toArray();

        $keys = $pageContentService->keys();
        foreach ($keys as $key) {
            $this->oModel->firstOrCreate([
                'slug' => $key,
                'lang_type' => "zh-tw",
            ], [
                'page_name' => $key,
            ]);
        }

        //
        $pageLimit = $this->request->get('pageLimit') ?: 10; //預設10
        //過濾條件
        $paginator = $this->oModel->filter($this->request->all())->with("audits")->paginate($pageLimit);



        return view('operate/pages/company/page_content/list', [
            'paginator' => $paginator,
            'model' => $this->oModel,
            'columns' => $userColumns,
            'tableSetting' => $TableSetting,
        ]);
    }

    // 新增、修改頁面
    public function updateHTML($id)
    {
        $user = auth('operate')->user();

        $model = $this->oModel->whereId($id)->first();

        $language = new Language();
        $langTypeKeys = array_keys($language->langTypeText);
        foreach ($langTypeKeys as $langType) {
            $this->oModel->firstOrCreate([
                'slug' => $model->slug,
                'lang_type' => $langType,
            ], [
                'page_name' => $model->page_name,
            ]);
        }
        $datas = $this->oModel->where('slug', $model->slug)->get();

        $haveDraft = false;
        foreach ($datas as $data) {
            if ($data->draft) {
                $haveDraft = true;
            }
        }

        //View
        return view('operate/pages/company/page_content/update', [
            'langTypeText' => $language->langTypeText,
            'datas' => $datas,
            'pageName' => $model->page_name,
            'haveDraft' => $haveDraft
        ]);
    }

    // 新增、修改
    public function update($id)
    {
        // $user = auth('operate')->user();

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

        // return redirect("/operate/page_content?" . $this->request->getQueryString())->with(['success' => __('送出成功')]);
        return back()->with(['success' => __('修改成功')]);
    }


    /**
     * 修改草稿
     */
    public function saveDraft()
    {
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

    //修改紀錄
    public function audit($id)
    {
        //
        $pageLimit = $this->request->get('pageLimit') ?: 10; //預設10
        //
        $Paginator = $this->oModel->findOrFail($id)->audits()->with('user')->orderBy('id', 'desc')->paginate($pageLimit);

        return view('operate/pages/page_content/audit', [
            'Paginator' => $Paginator,
            'Model' => $this->oModel,
        ]);
    }

    public function saveListColumn(ListColumnService $listColumnService)
    {
        $list = $this->request->get('list', []);
        $user = auth('operate')->user();
        $listColumnService->renewListColumn($this->oModel, $list, $user->id);
        return back();
    }
}
