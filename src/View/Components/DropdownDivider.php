<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DropdownDivider extends Component
{
    public string $tag;

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     */
    public function __construct(?string $tag = "hr")
    {
        $this->tag = $tag ?? "hr";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<li role="presentation"><hr role="separator" aria-orientation="horizontal" class="dropdown-divider"></li>
blade;
    }
}
