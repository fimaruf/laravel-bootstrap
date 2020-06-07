<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

class InputEmail extends Input
{
    /**
     * @inheritDoc
     */
    public function __construct(bool $plainText = false, string $size = null,  bool $isInvalid = false, bool $isValid = false)
    {
        parent::__construct($plainText, $size, "email", $isInvalid, $isValid);
    }
}
