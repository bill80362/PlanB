<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {


        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
//        dd($e);
        //資料庫無法連線
        if ($e instanceof QueryException ) {
            dd("錯誤：".$e->getMessage());
        }
        //資料更新，根據ID去find找不到資料
        if ($e instanceof ModelNotFoundException) {
            dd("錯誤：".$e->getMessage());
//            return view();
        }

        return parent::render($request, $e);
    }
}
