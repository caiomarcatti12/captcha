<?php

namespace CaioMarcatti12\Captcha\Adapter;

use CaioMarcatti12\Core\Validation\Assert;
use CaioMarcatti12\Captcha\Interfaces\CaptchaInterface;
use CaioMarcatti12\Env\Objects\Property;

class CaptchaMemoryAdapter implements CaptchaInterface
{
    public function resolve(string $token): bool
    {
        return Assert::equalsIgnoreCase($token, Property::get('captcha.memory.token-test', '123456'));
    }

}