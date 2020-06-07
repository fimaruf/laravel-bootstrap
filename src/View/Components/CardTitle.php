<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class CardTitle extends Component
{
    public ?string $tag;

    /**
     * Create a new component instance.
     * @param string $tag
     */
    public function __construct(string $tag = null)
    {
        $this->tag = $tag ?? 'h4';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<{{$tag}} {{$attributes->merge(['class'=>'card-title'])}}>{{$slot}}</{{$tag}}>
blade;

//        return view('components.card-title');
    }
}
