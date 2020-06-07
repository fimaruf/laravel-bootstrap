<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    /**
     * @var string
     */
    public string $tag;
    public ?string $href;
    /**
     * @var string
     * @link https://bootstrap-vue.org/docs/components/badge#contextual-variations
     */
    public string $variant;

    /**
     * @var bool
     * @link https://bootstrap-vue.org/docs/components/badge#pill-badges
     */
    public bool $pill;

    public array $attrs = [
        "class" => ["badge"]
    ];

    /**
     * Create a new component instance.
     *
     * @param string $tag
     * @param string $variant
     * @param bool $pill
     * @param string|null $href
     */
    public function __construct(
        ?string $tag = null,
        string $variant = "secondary",
        bool $pill = false,
        ?string $href = null
    )
    {
        $this->tag = $tag ?? "span";
        $this->variant = $variant;
        $this->pill = $pill;
        $this->href = $href;

        $this->attrs["class"][] = "badge-$variant";
        if ($this->pill) {
            $this->attrs["class"][] = "badge-pill";
        }
        if ($this->href) {
            $this->tag = "a";
            $this->attrs["href"] = $this->href;
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
<{{$tag}} {{$attributes->merge($attrs)}}>{{$slot}}</{{$tag}}>
blade;

//        return view('components.badge');
    }
}
