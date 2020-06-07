<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Thead extends Component
{
    public ?string $headVariant;

    public array $attrs = [
        "class" => [],
        "role" => "rowgroup"
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $headVariant
     */
    public function __construct(?string $headVariant = null)
    {
        $this->headVariant = $headVariant;
        if ($this->headVariant) {
            $this->attrs["class"][] = "thead-$this->headVariant";
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
<thead {{$attributes->merge($attrs)}}>{{$slot}}</thead>
blade;
    }
}
