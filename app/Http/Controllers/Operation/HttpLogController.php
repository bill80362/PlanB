<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Log\HttpLog;
use App\Services\Operate\SystemConfigService;
use Illuminate\Http\Request;

class HttpLogController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected HttpLog $oModel,
    ) {
    }

    public function listHTML()
    {
        $pageLimit = $this->request->get("pageLimit") ?: 10; //預設10
        $Paginator = $this->oModel->filter($this->request->all())->orderBy("created_at", "desc")->paginate($pageLimit);
        return view('operate/pages/http_log/list', [
            'Paginator' => $Paginator,
            'Model' => $this->oModel,
        ]);
    }

    public function updateHTML($id)
    {
        $Data = $this->oModel->findOrFail($id);

        if ($Data->request) {
            $Data->request =  json_encode(json_decode($Data->request), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        if ($Data->response) {
            $Data->response = json_encode(json_decode($Data->response), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        return view('operate/pages/http_log/update', [
            'Data' => $Data
        ]);
    }
}
