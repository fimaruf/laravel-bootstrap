<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class CardFooter extends Component
{
    public string $tag;
    public ?string $bgVariant;
    public ?string $textVariant;
    public ?string $borderVariant;

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param string|null $bgVariant
     * @param string|null $textVariant
     * @param string|null $borderVariant
     */
    public function __construct(
        string $tag = null,
        string $bgVariant = null,
        string $textVariant = null,
        string $borderVariant = null
    )
    {
        $this->tag = $tag ?? "div";
        $this->bgVariant = $bgVariant;
        $this->textVariant = $textVariant;
        $this->borderVariant = $borderVariant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.card-footer');
    }
}
