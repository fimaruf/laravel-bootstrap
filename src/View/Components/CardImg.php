<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class CardImg extends Component
{
    public string $src;
    public ?string $alt;
    public bool $top;
    public bool $bottom;
    public bool $start;
    public bool $left;
    public bool $end;
    public bool $right;
    public $height;
    public $width;

    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string $src
     * @param string|null $alt
     * @param bool $top
     * @param bool $bottom
     * @param bool $start
     * @param bool $left
     * @param bool $end
     * @param bool $right
     * @param null $height
     * @param null $width
     */
    public function __construct(
        ?string $src = null,
        ?string $alt = null,
        ?bool $top = false,
        ?bool $bottom = false,
        ?bool $start = false,
        ?bool $left = false,
        ?bool $end = false,
        ?bool $right = false,
        $height = null,
        $width = null
    )
    {
        $this->src = $src ?? '';
        $this->alt = $alt;
        $this->top = !!$top;
        $this->bottom = !!$bottom;
        $this->start = !!$start;
        $this->left = !!$left;
        $this->end = !!$end;
        $this->right = !!$right;
        $this->height = $height;
        $this->width = $width;


        $this->attrs["src"] = $this->src;
        if ($this->top) {
            $this->attrs["class"][] = "card-img-top";
        } elseif ($this->bottom) {
            $this->attrs["class"][] = "card-img-bottom";
        } elseif ($this->left || $this->start) {
            $this->attrs["class"][] = "card-img-left";
        } elseif ($this->right || $this->end) {
            $this->attrs["class"][] = "card-img-right";
        } else {
            $this->attrs["class"][] = "card-img";
        }
        if ($this->alt) {
            $this->attrs["alt"] = $this->alt;
        }
        if ($this->width) {
            $this->attrs["width"] = $this->width;
        }
        if ($this->height) {
            $this->attrs["width"] = $this->height;
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
        return view('laravel-bootstrap::components.card-img');
    }
}
