<?php

namespace Wovosoft\LaravelBootstrap\View\Components;


class FormInput extends Input
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $plainText = false, string $size = null, string $type = null, bool $isInvalid = false, bool $isValid = false)
    {
        parent::__construct($plainText, $size, $type, $isInvalid, $isValid);
    }

}
