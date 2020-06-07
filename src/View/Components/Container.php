<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Container extends Component
{
    public string $tag;
    public array $attrs = [
        "class" => ""
    ];

    /**
     * Create a new component instance.
     *
     * @param bool|string|null $fluid
     * @param string|null $tag
     */
    public function __construct($fluid = null, ?string $tag = null)
    {
        //when md,sm,lg,xl etc

        if ($fluid) {
            if (($fluid === '1' || $fluid === true || $fluid === 'fluid')) {
                $this->attrs['class'] = "container-fluid";
            } else {
                $this->attrs['class'] = "container-$fluid";
            }
        } else {
            $this->attrs['class'] = "container";
        }
        $this->tag = $tag ?? "div";
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
