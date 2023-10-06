<?php

use App\Http\Controllers\Operation;
use App\Http\Controllers\Operation\Config\FileUploadController;
use App\Http\Controllers\Operation\UserController;
use Illuminate\Support\Facades\Route;

// 請勿刪除此行註解，stub產生放置位置


/**後台*/
Route::prefix('operate')->middleware(['lang.extend', 'lang.detect', 'log.request', 'log.response'])->group(function () {
    //切換後台版面語言
    Route::get('/locale/config/{locale}', [Operation\Config\LocaleController::class, 'set'])->name('locale_config');

    //登入
    Route::get('/', [\App\Http\Controllers\Operation\IndexController::class, 'index']);
    Route::get('/login', [\App\Http\Controllers\Operation\LoginController::class, 'loginHTML']);
    Route::post('/login', [\App\Http\Controllers\Operation\LoginController::class, 'login']);
    Route::get('/logout', [\App\Http\Controllers\Operation\LoginController::class, 'logout']);

    Route::middleware([
        'auth:operate',
        'OperateLoginAuth',
        'check.first.render',
        'filter.tags',
        //        'online.user', //線上人數
    ])->group(function () {

        //Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Operation\IndexController::class, 'dashboard']);

        //管理人管理
        Route::group([
            'prefix' => 'user',
            'as' => 'user_',
        ], function () {
            Route::get('/', [UserController::class, 'listHTML'])->name('list')->can('user_read');
            Route::get('{id}', [UserController::class, 'updateHTML'])->whereNumber('id')->name('update_html')->can('user_update');
            Route::post('{id}', [UserController::class, 'update'])->whereNumber('id')->name('update')
                ->middleware(['common.timeDiffUpdate'])->can('user_update');
            Route::post('del', [UserController::class, 'delBatch'])->name('del')->can('user_delete');
            Route::get('export/{type}', [UserController::class, 'export'])->name('export')->where("type", '[key|value]+')->can('user_export');
            Route::post('import', [UserController::class, 'import'])->name('import')->can('user_import');
            Route::get('{id}/audit', [UserController::class, 'audit'])->whereNumber('id')->name('audit')->can('user_read');
            Route::post('list_column', [UserController::class, 'saveListColumn'])->name('saveListColumn');
        });
        //管理人權限群組
        Route::group([
            'prefix' => 'permission_group',
            'as' => 'permission_group_',
        ], function () {
            Route::get('/', [Operation\PermissionGroupController::class, 'listHTML'])->name('list')->can('user_read');
            Route::get('{id}', [Operation\PermissionGroupController::class, 'updateHTML'])->whereNumber('id')->name('update_html')->can('user_read');
            Route::post('{id}', [Operation\PermissionGroupController::class, 'update'])->whereNumber('id')->name('update')->can('user_update');
            Route::post('del', [Operation\PermissionGroupController::class, 'delBatch'])->name('del')->can('user_delete');
            Route::post('list_column', [Operation\PermissionGroupController::class, 'saveListColumn'])->name('saveListColumn');
        });

        //系統設定
        Route::get('system', [Operation\Config\SystemConfigController::class, 'updateHTML'])->name('system_update_html')->can('system_update');
        Route::post('system', [Operation\Config\SystemConfigController::class, 'update'])->name('system_update')->can('system_update');

        //http log
        Route::get('http_log', [Operation\Log\HttpLogController::class, 'listHTML'])->name('http_log_list');
        Route::get('http_log/{id}', [Operation\Log\HttpLogController::class, 'updateHTML'])->whereNumber('id')->name('http_log_update');

        //操作紀錄
        Route::group([
            'prefix' => 'audit',
            'as' => 'audit_',
        ], function () {
            Route::get('', [Operation\Log\AuditController::class, 'listHTML'])->name('list')->can('audit_read');
            Route::get('{id}', [Operation\Log\AuditController::class, 'updateHTML'])->whereNumber('id')->name('update_html');
            Route::post('{id}', [Operation\Log\AuditController::class, 'update'])->whereNumber('id')->name('update');
            Route::post('del', [Operation\Log\AuditController::class, 'delBatch'])->name('del');
            // Route::get('export', [Operation\AuditController::class, 'export'])->name('export');
            Route::post('import', [Operation\Log\AuditController::class, 'import'])->name('import');
            Route::post('reverse', [Operation\Log\AuditController::class, 'reverseBatch'])->name('reverse');
            Route::post('list_column', [Operation\Log\AuditController::class, 'saveListColumn'])->name('saveListColumn');
        });

        //語系
        Route::group([
            'prefix' => 'language',
            'as' => 'language_',
        ], function () {
            Route::get('', [Operation\Config\LanguageController::class, 'listHTML'])->name('list')->can('language_read');
            Route::get('{id}', [Operation\Config\LanguageController::class, 'updateHTML'])->whereNumber('id')->name('update_html')->can('language_read');
            Route::post('{id}', [Operation\Config\LanguageController::class, 'update'])->whereNumber('id')->name('update')->can('language_update');
            Route::post('del', [Operation\Config\LanguageController::class, 'delBatch'])->name('del')->can('language_delete');
            Route::get('export', [Operation\Config\LanguageController::class, 'export'])->name('export');
            Route::post('import', [Operation\Config\LanguageController::class, 'import'])->name('import');
            Route::post('make_file', [Operation\Config\LanguageController::class, 'makeFile'])->name('makeFile');
            Route::post('list_column', [Operation\Config\LanguageController::class, 'saveListColumn'])->name('saveListColumn');
        });

        //公司管理
        Route::get('/company_manage/{companyKey}', [Operation\Content\CompanyManageController::class, 'pageContentHtml'])->name('privacy_statement');
        Route::post('/company_manage/{companyKey}', [Operation\Content\CompanyManageController::class, 'pageContent'])->name('post_privacy_statement');

        //編輯器圖片上傳
        Route::post('/upload_image', [Operation\Config\FileController::class, 'uploadImage'])->name('upload_file');

        //檔案管理
        Route::group([
            'prefix' => 'file_upload',
            'as' => 'file_upload_',
        ], function () {
            Route::get('list', [FileUploadController::class, 'listHTML'])->name('list');
            Route::get('{id}', [FileUploadController::class, 'updateHTML'])->name('update_html');
            Route::post('del', [FileUploadController::class, 'delBatch'])->name('del');
        });

        // 範本
        if (!app()->isProduction()) {
            Route::get('/template/list', [Operation\TemplateController::class, 'list'])->name('template_list');
            Route::get('/template/detail', [Operation\TemplateController::class, 'detail'])->name('template_detail');

            // Route::get('/template/stub_list', [Operation\TemplateController::class, 'stubList'])->name('template_stub_list');
            // Route::get('/template/stub_update', [Operation\TemplateController::class, 'stubUpdate'])->name('template_stub_detail');
        }
    });
});
