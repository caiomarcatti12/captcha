<?php

namespace CaioMarcatti12\Captcha\Adapter;

use CaioMarcatti12\Captcha\Interfaces\CaptchaInterface;
use CaioMarcatti12\Env\Annotation\Value;

class RecaptchaAdapter implements CaptchaInterface
{
    #[Value('captcha.recaptcha.private-key', '')]
    private string $privateKey;

    public function resolve(string $token): bool
    {
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$this->privateKey.'&response='.$token);

        $responseData = json_decode($verifyResponse);

        return $responseData->success || false;
    }

}