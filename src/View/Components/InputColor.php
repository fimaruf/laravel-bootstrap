<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

class InputColor extends Input
{
    /**
     * @inheritDoc
     */
    public function __construct(bool $plainText = false, string $size = null, bool $isInvalid = false, bool $isValid = false)
    {
        parent::__construct($plainText, $size, "color", $isInvalid, $isValid);
    }
}
