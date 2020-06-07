<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Bootstrap Card Header.
 * Card Content should be provided as slot. It can be text or html.Content is sanitized by laravel
 * Class CardHeader
 * @param string|null $tag
 * @param string|null $bgVariant
 * @param string|null $textVariant
 * @param string|null $borderVariant
 * @param array|object|string|null $class
 * @package App\View\Components
 */
class CardHeader extends Component
{
    public string $tag;
    public ?string $bgVariant;
    public ?string $borderVariant;
    public ?string $textVariant;
    public array $classList;

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param string|null $bgVariant
     * @param string|null $borderVariant
     * @param string|null $textVariant
     */
    public function __construct(
        string $tag = null,
        string $bgVariant = null,
        string $borderVariant = null,
        string $textVariant = null
    )
    {
        $this->tag = $tag ?? "div";
        $this->bgVariant = $bgVariant ? "bg-$bgVariant" : null;
        $this->borderVariant = $borderVariant ? "border-$borderVariant" : null;
        $this->textVariant = $textVariant ? "text-$textVariant" : null;
        $this->classList = ["card-header"];
        if ($this->bgVariant) {
            $this->classList[] = $this->bgVariant;
        }
        if ($this->borderVariant) {
            $this->classList[] = $this->borderVariant;
        }
        if ($this->textVariant) {
            $this->classList[] = $this->textVariant;
        }
    }

    public function bsGetClassList($merge = []): string
    {
        return join(" ", array_merge($this->classList, $merge));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
                    <{{$tag}} {{$attributes->merge(["class"=>$bsGetClassList()])}}>{{$slot}}</{{$tag}}>
                blade;
//        return view('components.card-header');
    }
}
