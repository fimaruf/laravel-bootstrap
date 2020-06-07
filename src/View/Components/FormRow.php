<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormRow extends Component
{
    public string $tag;     //'div' 	Specify the HTML tag to render instead of the default tag
    public array $attrs = [
        "class" => ["row"]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     */
    public function __construct(?string $tag = null)
    {
        $this->tag = $tag ?? "div";
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
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
