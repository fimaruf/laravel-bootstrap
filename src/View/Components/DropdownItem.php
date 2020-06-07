<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public string $href;
    public ?string $rel;
    public ?string $target;
    public bool $active;
    public bool $disabled;
    public string $activeClass;
    public bool $exact;
    public string $exactActiveClass;
    public $linkClass;
    public ?string $variant;

    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $href
     * @param string|null $rel
     * @param string|null $target
     * @param bool|null $active
     * @param bool|null $disabled
     * @param string|null $activeClass
     * @param bool|null $exact
     * @param string|null $exactActiveClass
     * @param null $linkClass
     * @param string|null $variant
     */
    public function __construct(
        ?string $href = null,
        ?string $rel = null,
        ?string $target = null,
        ?bool $active = null,
        ?bool $disabled = null,
        ?string $activeClass = null,
        ?bool $exact = null,
        ?string $exactActiveClass = null,
        $linkClass = null,
        ?string $variant = null
    )
    {
        $this->href = $href ?? "#";
        $this->rel = $rel;
        $this->target = $target ?? "_self";
        $this->active = !!$active;
        $this->disabled = !!$disabled;
        $this->activeClass = $activeClass ?? "active";
        $this->exact = !!$exact;
        $this->exactActiveClass = $exactActiveClass ?? "active";
        $this->linkClass = is_array($linkClass) ? $linkClass : explode(" ", $linkClass);
        $this->variant = $variant;
        $this->linkClass[] = "dropdown-item";
        if ($this->variant) {
            $this->linkClass[] = "text-$this->variant";
        }
        $this->linkClass = implode(" ", $this->linkClass);
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.dropdown-item');
    }
}
