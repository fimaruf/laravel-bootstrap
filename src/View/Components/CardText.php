<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class CardText extends Component
{
    public string $cardTag;

    public array $attrs = [
        "class" => ["card-text"]
    ];

    /**
     * Create a new component instance.
     *
     * @param string $cardTag
     */
    public function __construct(string $cardTag = "div")
    {
        $this->cardTag = $cardTag ?? "div";
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.card-text');
    }
}
