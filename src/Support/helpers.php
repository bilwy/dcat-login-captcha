<?php

declare(strict_types=1);


use Bilwy\DcatLoginCaptcha\Facades\CaptchaBuilder;
use Bilwy\DcatLoginCaptcha\LoginCaptchaServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

if (! function_exists('login_captcha_check')) {
    /**
     * 登录验证码检查.
     */
    function login_captcha_check(string $value): bool
    {
        return Bilwy\DcatLoginCaptcha\PhraseBuilder::comparePhrases(
            Session::pull(LoginCaptchaServiceProvider::setting('captcha_phrase_session_key')),
            $value
        );
    }
}

if (! function_exists('login_captcha_url')) {
    /**
     * 获取登录验证码 url 地址.
     */
    function login_captcha_url(?string $routeName = null): string
    {
        return admin_route(
            $routeName ?? LoginCaptchaServiceProvider::setting('route.name'),
            ['random' => Str::random()]
        );
    }
}

if (! function_exists('login_captcha_content')) {
    /**
     * 获取登录验证码图像内容.
     *
     * @psalm-suppress InvalidNullableReturnType
     * @psalm-suppress NullableReturnStatement
     * @psalm-suppress InvalidArgument
     * @noinspection PhpVoidFunctionResultUsedInspection
     */
    function login_captcha_content(int $quality = 90): string
    {
        Session::put(LoginCaptchaServiceProvider::setting('captcha_phrase_session_key'), CaptchaBuilder::getPhrase());

        return CaptchaBuilder::get($quality);
    }
}

if (! function_exists('str')) {
    /**
     * @param mixed $string
     *
     * @return \Illuminate\Support\Stringable|\Stringable
     *
     * @codeCoverageIgnore
     */
    function str($string = null)
    {
        if (0 === func_num_args()) {
            return new class() implements \Stringable {
                public function __call($method, $parameters)
                {
                    return Str::$method(...$parameters);
                }

                public function __toString(): string
                {
                    return '';
                }
            };
        }

        return Str::of($string);
    }
}
