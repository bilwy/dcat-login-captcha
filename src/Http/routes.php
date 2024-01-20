<?php

declare(strict_types=1);


use Bilwy\DcatLoginCaptcha\Http\Controllers\CaptchaController;
use Bilwy\DcatLoginCaptcha\Http\Middleware\CleanObContents;
use Bilwy\DcatLoginCaptcha\Http\Middleware\SetResponseContentType;
use Bilwy\DcatLoginCaptcha\LoginCaptchaServiceProvider;
use Illuminate\Support\Facades\Route;

Route::get(LoginCaptchaServiceProvider::setting('route.uri'), CaptchaController::class)
    ->name(LoginCaptchaServiceProvider::setting('route.name'))
    ->middleware([
        SetResponseContentType::class,
        CleanObContents::class,
    ]);
