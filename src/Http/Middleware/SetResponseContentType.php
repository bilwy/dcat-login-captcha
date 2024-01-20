<?php

declare(strict_types=1);

namespace Bilwy\DcatLoginCaptcha\Http\Middleware;

use Bilwy\DcatLoginCaptcha\LoginCaptchaServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetResponseContentType
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, \Closure $next): Response
    {
        return tap($next($request), static function (Response $response): void {
            $response->header('Content-Type', sprintf('image/%s', LoginCaptchaServiceProvider::setting('type')));
        });
    }
}
