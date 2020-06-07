<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DropdownHeader extends Component
{
    public ?string $id;
    public string $tag;
    public ?string $variant;
    public bool $shouldWrap;
    public array $attrs = [
        "class" => [
            "dropdown-header"
        ],
        "role" => "heading"
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string $tag
     * @param string|null $variant
     * @param bool $shouldWrap
     */
    public function __construct(
        ?string $id=null,
        string $tag = "header",
        ?string $variant = null,
        bool $shouldWrap = true
    )
    {
        $this->id = $id;
        $this->tag = $tag ?? "header";
        $this->variant = $variant;
        $this->shouldWrap = !!$shouldWrap;
        if ($this->id) {
            $this->attrs["id"] = $id;
        }
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
        return view('laravel-bootstrap::components.dropdown-header');
    }
}
