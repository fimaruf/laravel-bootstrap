<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DropdownItemButton extends Component
{
    public bool $active;
    public string $activeClass;
    public $buttonClass;
    public bool $disabled;
    public ?string $variant;

    public array $attrs = [
        "class" => [
            "dropdown-item"
        ],
        "type" => "button",
        "role" => "menuitem"
    ];

    /**
     * Create a new component instance.
     *
     * @param bool $active
     * @param string $activeClass
     * @param null $buttonClass
     * @param bool $disabled
     * @param string|null $variant
     */
    public function __construct(
        bool $active = false,
        string $activeClass = "active",
        $buttonClass = null,
        bool $disabled = false,
        ?string $variant = null
    )
    {
        $this->active = !!$active;
        $this->activeClass = $activeClass ?? "active";
        $this->buttonClass = is_array($buttonClass) ? $buttonClass : explode(" ", $buttonClass);
        $this->disabled = !!$disabled;
        $this->variant = $variant;

        if ($this->variant) {
            $this->attrs["class"][] = "btn-$this->variant";
        }
        if ($this->active) {
            $this->attrs["class"][] = $this->activeClass;
        }
        if ($this->disabled) {
            $this->attrs["disabled"] = true;
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
        return view('laravel-bootstrap::components.dropdown-item-button');
    }
}
