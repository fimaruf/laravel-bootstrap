<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Link extends Component
{
    public ?string $href;
    public ?string $rel;
    public ?string $target;
    public bool $active;
    public bool $disabled;
    public string $activeClass;
    public bool $exact;
    public string $exactActiveClass;
    public array $attrs = [
        "class" => []
    ];
    public array $customAttrs;

    /**
     * Create a new component instance.
     *
     * @param string $href
     * @param string|null $rel
     * @param string|null $target
     * @param bool|null $active
     * @param bool|null $disabled
     * @param string|null $activeClass
     * @param bool|null $exact
     * @param string|null $exactActiveClass
     * @param array|null $customAttrs
     */
    public function __construct(
        ?string $href,
        ?string $rel = null,
        ?string $target = null,
        ?bool $active = false,
        ?bool $disabled = false,
        ?string $activeClass = "active",
        ?bool $exact = false,
        ?string $exactActiveClass = "active",
        ?array $customAttrs = []
    )
    {
        $this->href = $href;
        $this->rel = $rel;
        $this->target = $target ?? "_self";
        $this->active = !!$active;
        $this->disabled = !!$disabled;
        $this->activeClass = $activeClass ?? "active";
        $this->exact = !!$exact;
        $this->exactActiveClass = $exactActiveClass ?? "active";

        if ($this->href) {
            $this->attrs["href"] = $this->href;
        }

        if ($this->rel) {
            $this->attrs["rel"] = $this->rel;
        }
        if ($this->target) {
            $this->attrs["target"] = $this->target;
        }

        if ($this->active) {
            $this->attrs["class"][] = $this->activeClass;
        }
        if ($this->disabled) {
            $this->attrs["class"][] = "disabled";
            $this->attrs["aria-disabled"] = "true";
        }
        if ($this->exact) {
            $this->attrs["class"][] = $this->exactActiveClass;
        }
        $this->customAttrs = $customAttrs ?? [];

        $this->attrs["class"] = join(" ", $this->attrs["class"]);
    }

    public function resolveLinkAttrs()
    {
        $out = [];
        foreach ($this->customAttrs as $attr => $value) {
            $out [] = "$attr='$value'";
        }
        return implode(' ', $out);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.link');
    }
}
