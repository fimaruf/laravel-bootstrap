<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class NavItem extends Component
{
    public string $href;
    public ?string $rel;
    public string $target;
    public bool $active;
    public bool $disabled;
    public ?string $activeClass;
    public bool $exact;
    public ?string $exactActiveClass;
    /**
     * @var array|object|string|null
     */
    public ?array $linkAttrs;
    /**
     * @var array|object|string|null
     */
    public $linkClasses;

    public array $attrs = [
        "class" => [
            "nav-item"
        ]
    ];

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
     * @param array|null $linkAttrs
     * @param null $linkClasses
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
        ?array $linkAttrs = null,
        $linkClasses = null
    )
    {
        $this->href = $href ?? '#';
        $this->rel = $rel;
        $this->target = $target ?? "_self";
        $this->active = !!$active;
        $this->disabled = !!$disabled;
        $this->activeClass = $activeClass;
        $this->exact = !!$exact;
        $this->exactActiveClass = $exactActiveClass;
        $this->linkAttrs = $linkAttrs ?? [];
        $this->linkClasses = $linkClasses;

        //as a nav link, we just need to pass the nav-link class to the Link Component,
        if (!is_array($this->linkClasses)) {
            $this->linkClasses = explode(" ", $this->linkClasses);
        }
        if (!in_array("nav-link", $this->linkClasses)) {
            $this->linkClasses[] = "nav-link";
        }

        $this->linkClasses = implode(" ", $this->linkClasses);
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.nav-item');
    }
}
