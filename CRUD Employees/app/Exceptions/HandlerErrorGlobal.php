<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class HandlerErrorGlobal extends Handler
{
    use ApiResponse;

    public function render($req, Throwable $e)
    {
        if ($this->isApiRequest($req)) {
            return $this->handleApiException($e);
        }

        return parent::render($req, $e);
    }

    protected function isApiRequest($req): bool
    {
        return $req->expectsJson() || $req->is('api/*');
    }

    public function handleApiException(Throwable $e)
    {
        if ($e instanceof DatabaseException) {
            return $this->errorResponse($e->getMessage(), $e->errors, $e->statusCode);
        }

        if ($e instanceof BaseException) {
            return $this->errorResponse($e->getMessage(), $e->errors, $e->statusCode);
        }

        if ($e instanceof ValidationException) {
            return $this->errorResponse('Validation failed', $e->errors(), 422);
        }

        if ($e instanceof AuthenticationException) {
            return $this->errorResponse('Unauthenticated', [], 401);
        }

        if ($e instanceof AuthorizationException) {
            return $this->errorResponse('Unauthorized', [], 403);
        }

        if ($e instanceof NotFoundHttpException) {
            return $this->errorResponse('Not Found', [], 404);
        }

        return $this->errorResponse('Internal Server Error', [], 500);
    }
}
