<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web     : __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health  : '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(
            function (Exception $exception): Response {
                $responseBody = [
                    'success' => false,
                ];

                $response = response();

                if ($exception->getPrevious() instanceof ModelNotFoundException) {
                    return $response->json([
                            ...$responseBody,
                            'message' => 'Resource not found',
                            'code'    => Response::HTTP_NOT_FOUND,
                        ])
                        ->setStatusCode(Response::HTTP_NOT_FOUND);
                }

                return $response->json([
                        ...$responseBody,
                        'message' => $exception->getMessage(),
                        'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                    ])
                    ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);

            },
        );
    })->create();
