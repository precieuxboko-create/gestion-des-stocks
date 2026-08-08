<?php

use App\Http\Middleware\VerificationActive;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    //on créé un alias pour notre middleware Verification pour proteger nos route
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'status'=>VerificationActive::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (\Throwable $e, $request){
            return response()->json([
                'message'=>'Vous devriez être authentifié',
            ]);
        });

    })->create();
