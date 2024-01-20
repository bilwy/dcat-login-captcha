<?php

declare(strict_types=1);

namespace Bilwy\DcatLoginCaptcha;

use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Traits\Tappable;

class PhraseBuilder extends \Gregwar\Captcha\PhraseBuilder
{
    // use Conditionable;
    use Macroable;
    use Tappable;
}
