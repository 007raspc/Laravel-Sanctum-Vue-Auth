<?php

namespace App\Exceptions;

use App\Service\ApiResponse\ApiResponseService;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;

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
    public function render($request, Throwable $e): JsonResponse|Response
    {
        if ($e instanceof AuthorizationException) {
            $service = new ApiResponseService();
            return $service->sendError(
                [],
                'Errors.403',
                403
            );
        }

        return parent::render($request, $e);
    }
}
