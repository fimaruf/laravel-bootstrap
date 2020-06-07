<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class Button extends Component
{
    public bool $block;
    public bool $disabled;
    public ?string $size;
    public ?string $variant;
    public ?string $type;
    public ?string $tag;
    public bool $pill;
    public bool $squared;
    public bool $pressed;
    public ?string $href;
    public ?string $rel;
    public ?string $target;
    public bool $active;
    public string $activeClass;
    public bool $exact;
    public string $exactActiveClass;


    public array $attrs = [
        "class" => [
            "btn"
        ]
    ];

    /**
     * Create a new component instance.
     * @param bool|null $block
     * @param bool|null $disabled
     * @param string|null $size
     * @param string|null $variant
     * @param string|null $type
     * @param string|null $tag
     * @param bool|null $pill
     * @param bool|null $squared
     * @param bool|null $pressed
     * @param string|null $href
     * @param string|null $rel
     * @param string|null $target
     * @param bool|null $active
     * @param string|null $activeClass
     * @param bool|null $exact
     * @param string|null $exactActiveClass
     */
    public function __construct(
        ?bool $block = null,
        ?bool $disabled = null,
        ?string $size = null,
        ?string $variant = null,
        ?string $type = null,
        ?string $tag = null,
        ?bool $pill = null,
        ?bool $squared = null,
        ?bool $pressed = null,
        ?string $href = null,
        ?string $rel = null,
        ?string $target = null,
        ?bool $active = null,
        ?string $activeClass = null,
        ?bool $exact = null,
        ?string $exactActiveClass = null
    )
    {
        $this->block = !!$block;
        $this->disabled = !!$disabled;
        $this->size = $size;
        $this->variant = $variant ?? "secondary";
        $this->type = $type ?? "button";
        $this->tag = $tag ?? "button";
        $this->pill = !!$pill;
        $this->squared = !!$squared;
        $this->pressed = !!$pressed;
        $this->href = $href;
        if ($this->href) {
            $this->tag = "a";
        }
        $this->rel = $rel;
        $this->target = $target ?? "_self";
        $this->active = !!$active;
        $this->activeClass = $activeClass ?? "active";
        $this->exact = !!$exact;
        $this->exactActiveClass = $exactActiveClass ?? "active";

        if ($this->block) {
            $this->attrs["class"][] = "btn-block";
        }
        if ($this->disabled) {
            $this->attrs["class"][] = "disabled";
            $this->attrs["disabled"] = true;
        }
        if ($this->size) {
            $this->attrs["class"][] = "btn-$this->size";
        }
        $this->attrs["class"][] = "btn-$this->variant";
        if ($this->tag === "a") {
            $this->attrs['target'] = $this->target;
            $this->attrs['rel'] = $this->rel;
            $this->attrs["href"] = $this->href;
        } elseif ($this->tag === "button") {
            $this->attrs["type"] = $this->type;
        }
        if ($this->pill) {
            $this->attrs["class"][] = "rounded-pill";
        }
        if ($this->squared) {
            $this->attrs["class"][] = "rounded-0";
        }
        if ($this->pressed) {
            $this->attrs["aria-pressed"] = true;
            $this->attrs["autocomplete"] = "off";
            $this->active = true;   //let this be handled by active condition
        }
        if ($this->active && !in_array($this->activeClass, $this->attrs["class"])) {
            $this->attrs["class"][] = $this->activeClass;
        }
        if ($this->exact && !in_array($this->exactActiveClass, $this->attrs["class"])) {
            $this->attrs["class"][] = $this->exactActiveClass;
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
        return <<<'blade'
<{{$tag}} {{$attributes->merge($attrs)}}>{{$slot}}</{{$tag}}>
blade;
    }
}

