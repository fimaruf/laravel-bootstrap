<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Dismissible extends Component
{
    public string $tag;
    public ?string $ariaLabel;
    public string $dismiss;
    public string $icon;

    /**
     * Create a new component instance.
     *
     * @param string $dismiss
     * @param string|null $ariaLabel
     * @param string $tag
     * @param string $icon
     */
    public function __construct(string $dismiss, string $ariaLabel = "Close", string $tag = "button", $icon = '&times;')
    {
        $this->dismiss = $dismiss;
        $this->ariaLabel = $ariaLabel;
        $this->tag = $tag;
        $this->icon = $icon;
    }

    public function isButton($tag)
    {
        return $tag === "button";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<{{$tag}} {!! $isButton($tag)?'type="button"':'' !!} {{$attributes->merge(['class'=>'close'])}} data-dismiss="{{$dismiss}}" aria-label="{{$ariaLabel}}">
    <span aria-hidden="true">{!! $icon !!}</span>
</{{$tag}}>
blade;
    }
}
