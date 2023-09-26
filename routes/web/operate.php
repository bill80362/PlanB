<?php

use App\Http\Controllers\Operation;
use App\Http\Controllers\Operation\UserController;
use Illuminate\Support\Facades\Route;

/**後台*/
Route::prefix('/operate')->middleware(['log.request', 'log.response'])->group(function () {
    //登入
    Route::get('/', [\App\Http\Controllers\Operation\IndexController::class, 'index']);
    Route::get('/login', [\App\Http\Controllers\Operation\LoginController::class, 'loginHTML']);
    Route::post('/login', [\App\Http\Controllers\Operation\LoginController::class, 'login']);
    Route::get('/logout', [\App\Http\Controllers\Operation\LoginController::class, 'logout']);

    Route::middleware(['auth:operate', 'OperateLoginAuth', 'online.user'])->group(function () {

        //Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Operation\IndexController::class, 'dashboard']);

        //管理人管理
        Route::group([
            'prefix' => 'user',
            'as' => 'user_',
        ], function () {
            Route::get('/', [UserController::class, 'listHTML'])->name('list')->middleware(['can:user_read']);
            Route::get('/{id}', [UserController::class, 'updateHTML'])->whereNumber('id')->name('update_html')->middleware(['can:user_read']);
            Route::post('/{id}', [UserController::class, 'update'])->whereNumber('id')->name('update')->middleware(['can:user_update']);
            Route::post('/del', [UserController::class, 'delBatch'])->name('del')->middleware(['can:user_delete']);
            Route::get('/export/{type}', [UserController::class, 'export'])->name('export')->where("type",'[key|value]+')->middleware(['can:user_export']);
            Route::post('/import', [UserController::class, 'import'])->name('import')->middleware(['can:user_import']);
            Route::get('/{id}/audit', [UserController::class, 'audit'])->whereNumber('id')->name('audit')->middleware(['can:user_read']);
        });

        Route::group([
            'prefix' => 'permission_group',
            'as' => 'permission_group_',
        ], function () {
            Route::get('/', [Operation\PermissionGroupController::class, 'listHTML'])->name('list')->middleware(['can:user_read']);
            Route::get('/{id}', [Operation\PermissionGroupController::class, 'updateHTML'])->whereNumber('id')->name('update_html')->middleware(['can:user_read']);
            Route::post('/{id}', [Operation\PermissionGroupController::class, 'update'])->whereNumber('id')->name('update')->middleware(['can:user_update']);
            Route::post('/del', [Operation\PermissionGroupController::class, 'delBatch'])->name('del')->middleware(['can:user_delete']);
            Route::get('/export', [Operation\PermissionGroupController::class, 'export'])->name('export')->middleware(['can:user_export']);
            Route::post('/import', [Operation\PermissionGroupController::class, 'import'])->name('import')->middleware(['can:user_import']);
        });

        //系統設定
        Route::get('/system', [Operation\SystemController::class, 'updateHTML'])->name('system_update_html')->middleware(['can:system_update']);
        Route::post('/system', [Operation\SystemController::class, 'update'])->name('system_update')->middleware(['can:system_update']);
        Route::post('/delete/image', [Operation\SystemController::class, 'deleteImage'])->name('system_delete_image')->middleware(['can:system_update']);

        Route::get('/http_log', [Operation\HttpLogController::class, 'listHTML'])->name('http_log_list');
        Route::get('/http_log/{id}', [Operation\HttpLogController::class, 'updateHTML'])->whereNumber('id')->name('http_log_update');

        //操作紀錄
        Route::get('/audit', [Operation\AuditController::class, 'listHTML'])->name('audit_list');
        Route::get('/audit/{id}', [Operation\AuditController::class, 'updateHTML'])->whereNumber('id')->name('audit_update_html');
        Route::post('/audit/{id}', [Operation\AuditController::class, 'update'])->whereNumber('id')->name('audit_update');
        Route::post('/audit/del', [Operation\AuditController::class, 'delBatch'])->name('audit_del');
        Route::get('/audit/export', [Operation\AuditController::class, 'export'])->name('audit_export');
        Route::post('/audit/import', [Operation\AuditController::class, 'import'])->name('audit_import');
        Route::post('/audit/reverse', [Operation\AuditController::class, 'reverseBatch'])->name('reverse');

        //語系
        Route::get('/language', [Operation\LanguageController::class, 'listHTML'])->name('language_list')
            ->middleware(['can:language_read']);
        Route::get('/language/{id}', [Operation\LanguageController::class, 'updateHTML'])->whereNumber('id')
            ->name('language_update_html')->middleware(['can:language_read']);
        Route::post('/language/{id}', [Operation\LanguageController::class, 'update'])
            ->whereNumber('id')->name('language_update')->middleware(['can:language_update']);
        Route::post('/language/del', [Operation\LanguageController::class, 'delBatch'])
            ->name('language_del')->middleware(['can:language_delete']);
        Route::get('/language/export', [Operation\LanguageController::class, 'export'])
            ->name('language_export');
        Route::post('/language/import', [Operation\LanguageController::class, 'import'])->name('language_import');
        Route::post('/language/make_file', [Operation\LanguageController::class, 'makeFile'])->name('language_makeFile');

        //公司管理
        Route::get('/company_manage/{key}', [Operation\CompanyManageController::class, 'pageContentHtml'])->name('privacy_statement')
            ->middleware([]);
        Route::post('/company_manage/{key}', [Operation\CompanyManageController::class, 'pageContent'])->name('post_privacy_statement')
            ->middleware([]);

        Route::post('/upload_image', [Operation\FileController::class, 'uploadImage'])
            ->name('upload_file');
    });
});
