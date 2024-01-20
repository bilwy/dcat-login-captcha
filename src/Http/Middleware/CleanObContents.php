<?php

declare(strict_types=1);

namespace Bilwy\DcatLoginCaptcha\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CleanObContents
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, \Closure $next): Response
    {
        ob_get_contents() and ob_clean();

        return $next($request);
    }
}
