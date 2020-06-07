<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Tr extends Component
{
    public ?string $variant;
    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $variant
     */
    public function __construct(?string $variant = null)
    {
        $this->variant = $variant;
        if ($this->variant) $this->attrs["class"][] = "table-$this->variant";
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.tr');
    }
}
