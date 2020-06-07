<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class InputNumber extends Input
{
    public function __construct(bool $plainText = false, string $size = null, bool $isInvalid = false, bool $isValid = false)
    {
        parent::__construct($plainText, $size, "number", $isInvalid, $isValid);
    }
}
