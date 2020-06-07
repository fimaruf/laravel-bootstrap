<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

class Td extends Th
{
    /**
     * Create a new component instance.
     * @param string|null $variant
     * @param int|null $colspan
     * @param int|null $rowspan
     */
    public function __construct(?string $variant = null, ?int $colspan = null, ?int $rowspan = null)
    {
        parent::__construct($variant, $colspan, $rowspan);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<td {{$attributes->merge($attrs)}}>{{$slot}}</td>
blade;
    }
}
