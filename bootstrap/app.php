<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustHosts(at: ['dish-diaries.nurlan.dev']);

        $middleware->alias([
            'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localizationRedirect'  => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localize'              => \App\Http\Middleware\Localize::class,
        ]);

        $middleware->web(['localeSessionRedirect', 'localizationRedirect', 'localize']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
