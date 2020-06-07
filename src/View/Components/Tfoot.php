<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Tfoot extends Component
{
    public ?string $footVariant;

    public array $attrs = [
        "class" => [],
        "role" => "rowgroup"
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $footVariant
     */
    public function __construct(?string $footVariant = null)
    {
        $this->footVariant = $footVariant;
        if ($this->footVariant) {
            $this->attrs["class"][] = "table-$this->footVariant";
        }
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<tfoot {{$attributes->merge($attrs)}}>{{$slot}}</tfoot>
blade;
    }
}
