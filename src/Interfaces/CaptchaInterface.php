<?php

namespace CaioMarcatti12\Captcha\Interfaces;

interface CaptchaInterface
{
    public function resolve(string $token): bool;
}