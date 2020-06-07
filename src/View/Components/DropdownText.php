<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DropdownText extends Component
{
    public string $tag;
    public ?string $variant;
    public array $attrs = [
        "class" => [
            "b-dropdown-text"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string $tag
     * @param string|null $variant
     */
    public function __construct(string $tag = "p", ?string $variant = null)
    {
        $this->tag = $tag ?? "p";
        $this->variant = $variant;

        if ($this->variant) {
            $this->attrs["class"][] = "text-$this->variant";
        }
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.dropdown-text');
    }
}
