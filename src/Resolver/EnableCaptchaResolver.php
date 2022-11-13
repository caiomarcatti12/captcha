<?php

namespace CaioMarcatti12\Captcha\Resolver;

use CaioMarcatti12\Core\Bean\Annotation\AnnotationResolver;
use CaioMarcatti12\Core\Bean\Interfaces\ClassResolverInterface;
use CaioMarcatti12\Core\Bean\Objects\BeanProxy;
use ReflectionClass;
use CaioMarcatti12\Captcha\Annotation\EnableCaptcha;
use CaioMarcatti12\Captcha\Interfaces\CaptchaInterface;

#[AnnotationResolver(EnableCaptcha::class)]
class EnableCaptchaResolver implements ClassResolverInterface
{
    public function handler(object &$instance): void
    {
        $reflectionClass = new ReflectionClass($instance);

        $attributes = $reflectionClass->getAttributes(EnableCaptcha::class);

        /** @var EnableCaptcha $attribute */
        $attribute = ($attributes[0]->newInstance());

        BeanProxy::add(CaptchaInterface::class, $attribute->getAdapter());
    }
}