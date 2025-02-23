<?php

use App\Helpers\ApiResponseHelper;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Validation\ValidationException;

function render($request, Throwable $exception)
{
    // Check if the request is for API (expects JSON)
    if ($request->expectsJson()) {

        // Handle validation errors
        if ($exception instanceof ValidationException) {
            return ApiResponseHelper::error('Validation failed', 422,$exception->errors());
        }

        // Handle authentication errors
        if ($exception instanceof AuthenticationException) {
            return ApiResponseHelper::error('Unauthorized access', 401);
        }

        // Handle not found errors
        if ($exception instanceof NotFoundHttpException) {
            return ApiResponseHelper::error('Resource not found', 404);
        }

        // Handle method not allowed errors
        if ($exception instanceof MethodNotAllowedHttpException) {
            return ApiResponseHelper::error('Method not allowed', 405);
        }

        // Handle other unexpected exceptions
        return ApiResponseHelper::error ('An unexpected error occurred', 500, [
            'error' => $exception->getMessage(),
        ]);
    }

    // For non-API requests, use default behavior
    return parent::render($request, $exception);
}
