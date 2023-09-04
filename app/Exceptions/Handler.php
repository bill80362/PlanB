<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        //接住Model的找不到
//        dd($this);
//        $this->renderable(function (ModelNotFoundException $e, $request) {
//            dd("AA");
//            return response()->json(['status' => 'failed', 'message' => 'Model not found'], 404);
//        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
