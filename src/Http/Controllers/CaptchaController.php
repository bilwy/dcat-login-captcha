<?php

declare(strict_types=1);

namespace Bilwy\DcatLoginCaptcha\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CaptchaController extends Controller
{
    public function __invoke(): Response
    {
        return response(login_captcha_content());
    }
}
