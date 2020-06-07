<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Th extends Component
{
    public ?string $variant;
    public ?int $colspan;
    public ?int $rowspan;
    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $variant
     * @param int|null $colspan
     * @param int|null $rowspan
     */
    public function __construct(
        ?string $variant = null,
        ?int $colspan = null,
        ?int $rowspan = null
    )
    {
        $this->variant = $variant;
        $this->colspan = $colspan;
        $this->rowspan = $rowspan;
        if ($this->variant) {
            $this->attrs["class"][] = "table-$this->variant";
        }
        if ($this->colspan) {
            $this->attrs["colspan"] = $this->colspan;
        }
        if ($this->rowspan) {
            $this->attrs["rowspan"] = $this->rowspan;
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
<th {{$attributes->merge($attrs)}}>{{$slot}}</th>
blade;
    }
}
