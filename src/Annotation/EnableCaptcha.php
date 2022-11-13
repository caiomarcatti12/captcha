<?php

namespace CaioMarcatti12\Captcha\Annotation;

use Attribute;
use CaioMarcatti12\Captcha\Adapter\RecaptchaAdapter;
use CaioMarcatti12\Core\Modules\Modules;
use CaioMarcatti12\Core\Modules\ModulesEnum;

#[Attribute(Attribute::TARGET_CLASS)]
class EnableCaptcha
{
    private string $adapter = '';

    public function __construct(string $adapter = RecaptchaAdapter::class)
    {
        $this->adapter = $adapter;

        Modules::enable(ModulesEnum::CAPTCHA);
    }

    public function getAdapter(): string
    {
        return $this->adapter;
    }


}