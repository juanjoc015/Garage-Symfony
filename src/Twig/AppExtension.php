<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

//crear filtro 
class AppExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('static_call', [$this, 'staticCall']),
        ];
    }

    public function staticCall(string $class, string $method, ...$args)
    {
        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf('Class "%s" does not exist.', $class));
        }

        if (!method_exists($class, $method)) {
            throw new \InvalidArgumentException(sprintf('Method "%s::%s()" does not exist.', $class, $method));
        }

        return $class::$method(...$args);
    }
}