<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
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

        
        $this->renderable(function (AuthenticationException $e, Request $request) {

            //unauthorized api request
            if ($request->is('api/*')) {                

                return response()->json([
                    'status' => false,
                    'code' => 401,
                    'message' => 'Unauthorized',
                    'payload' => null

                ],401);
            }
        });

        $this->renderable(function (Exception $e, Request $request) {

            //internal server error
            if ($request->is('api/*')) {                

                return response()->json([
                    'status' => false,
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'payload' => null

                ],200);
            }
        });
    }
}
