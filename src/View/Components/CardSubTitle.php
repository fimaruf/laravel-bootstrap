<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class CardSubTitle extends Component
{
    public ?string $tag;
    public array $classList;
    public ?string $textVariant;

    /**
     * Create a new component instance.
     * @param string $tag
     * @param string|null $textVariant
     */
    public function __construct(string $tag = null, ?string $textVariant = null)
    {
        $this->tag = $tag ?? 'h6';
        $this->textVariant = $textVariant ? "text-$textVariant" : "text-muted";
        $this->classList = [
            "card-subtitle",
            $this->textVariant
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
                <{{$tag}} {{$attributes->merge(['class'=>join(" ",$classList)])}}>{{$slot}}</{{$tag}}>
                blade;
    }
}
