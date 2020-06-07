<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class CardGroup extends Component
{
    public string $tag;
    public bool $deck;
    public bool $columns;

    public array $attrs = [
        "class" => [

        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string $tag
     * @param bool $deck
     * @param bool $columns
     */
    public function __construct(
        string $tag = "div",
        bool $deck = false,
        bool $columns = false
    )
    {
        $this->tag = $tag ?? "div";
        $this->deck = !!$deck;
        $this->columns = !!$columns;
        if ($this->deck) {
            $this->attrs["class"] = ["card-deck"];
        } elseif ($this->columns) {
            $this->attrs["class"] = ["card-columns"];
        } else {
            $this->attrs["class"] = ["card-group"];
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
        return view('laravel-bootstrap::components.card-group');
    }
}
