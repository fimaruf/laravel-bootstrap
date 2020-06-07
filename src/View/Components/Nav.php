<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Nav extends Component
{
    public string $tag;
    public bool $fill;
    public bool $justified;
    public ?string $align;  //left, start | center, center | right, end
    public bool $tabs;
    public bool $pills;
    public bool $vertical;
    public bool $small;
    public bool $cardHeader;

    public array $attrs = [
        "class" => [
            "nav"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param bool|null $fill
     * @param bool|null $justified
     * @param string|null $align
     * @param bool|null $tabs
     * @param bool|null $pills
     * @param bool|null $vertical
     * @param bool|null $small
     * @param bool|null $cardHeader
     */
    public function __construct(
        ?string $tag = null,
        ?bool $fill = null,
        ?bool $justified = null,
        ?string $align = null,
        ?bool $tabs = null,
        ?bool $pills = null,
        ?bool $vertical = null,
        ?bool $small = null,
        ?bool $cardHeader = null
    )
    {
        $this->tag = $tag ?? "ul";
        $this->fill = !!$fill;
        $this->justified = !!$justified;
        $this->align = $align;
        $this->tabs = !!$tabs;
        $this->pills = !!$pills;
        $this->vertical = !!$vertical;
        $this->small = !!$small;
        $this->cardHeader = !!$cardHeader;
        if ($this->tabs) {
            $this->attrs["class"][] = "nav-tabs";
            if ($this->cardHeader) {
                $this->attrs["class"][] = "card-header-tabs";
            }
        }
        if ($this->pills) {
            $this->attrs["class"][] = "nav-pills";
            if ($this->cardHeader) {
                $this->attrs["class"][] = "card-header-pills";
            }
        }
        if ($this->small) {
            $this->attrs["class"][] = "small";
        }
        if ($this->fill) {
            $this->attrs["class"][] = "nav-fill";
        }
        if ($this->justified) {
            $this->attrs["class"][] = "nav-justified";
        }
        if ($this->vertical) {
            $this->attrs["class"][] = "flex-column";
        }

        /*
         * To align your <b-nav-item> components, use the align prop. Available values are left, center and right.
         * for these values justify-content-start, justify-content-center, justify-content-end are used respectively.
         * So we can use start, center, end too which is not supported in bootstrap-vue.
         */
        if ($this->align) {
            if (in_array($this->align, ["left", "center", "right"])) {
                $this->attrs["class"][] = "justify-content-" . ["left" => "start", "center" => "center", "right" => "end"][$this->align];
            } elseif (in_array($this->align, ["start", "center", "end"])) {
                $this->attrs["class"][] = "justify-content-$this->align";
            }
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
        return view('laravel-bootstrap::components.nav');
    }
}
