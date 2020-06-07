<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class ListGroupItem extends Component
{
    public string $tag;
    private bool $button;
    private ?string $variant;
    private ?string $href;
    private ?string $rel;
    private ?string $target;
    private bool $active;
    private bool $disabled;
    private ?string $to; //same as $href, added just to keep similarities with the BSV api
    private string $activeClass;
    private bool $exact;
    private string $exactActiveClass;

    public array $attrs = [
        "class" => ["list-group-item"]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param bool|null $button
     * @param string|null $variant
     * @param string|null $href
     * @param string|null $rel
     * @param string|null $target
     * @param bool|null $active
     * @param bool|null $disabled
     * @param string|null $to
     * @param string|null $activeClass
     * @param bool|null $exact
     * @param string|null $exactActiveClass
     */
    public function __construct(
        ?string $tag = null,
        ?bool $button = false,
        ?string $variant = null,
        ?string $href = null,
        ?string $rel = null,
        ?string $target = null,
        ?bool $active = false,
        ?bool $disabled = false,
        ?string $to = null,
        ?string $activeClass = null,
        ?bool $exact = null,
        ?string $exactActiveClass = null
    )
    {
        $this->tag = $tag ?? "div";
        $this->variant = $variant;
        $this->button = !!$button;
        $this->href = $href;
        $this->rel = $rel;
        $this->target = $target;
        $this->active = !!$active;
        $this->activeClass = $activeClass ?? "active";
        $this->disabled = !!$disabled;
        $this->to = $to;
        $this->exact = !!$exact;
        $this->exactActiveClass = $exactActiveClass ?? "active";
        if ($this->button) {
            $this->tag = "button";
        }
        if ($this->href || $this->to) {
            $this->tag = "a";
            $this->attrs["href"] = $this->href || $this->to;
        }
        if ($this->variant) {
            $this->attrs["class"][] = "list-group-item-$this->variant";
        }
        if ($this->active && !in_array($this->activeClass, $this->attrs["class"])) {
            $this->attrs["class"][] = $this->activeClass;
        }
        if ($this->disabled) {
            $this->attrs["class"][] = "disabled";
        }
        if ($this->exact && !in_array($this->exactActiveClass, $this->attrs["class"])) {
            $this->attrs["class"][] = $this->exactActiveClass;
        }
        if ($this->target) {
            $this->attrs["target"] = $this->target;
        }
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.list-group-item');
    }
}
