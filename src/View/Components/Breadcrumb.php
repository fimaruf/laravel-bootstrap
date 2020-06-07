<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public ?string $tag;
    public ?string $wrapper;
    public ?string $ariaLabel;
    public ?array $items;               //Array of breadcrumb items to render

    public ?string $variant;
    public array $dottedItems;

    public ?string $itemTag;

    /**
     * Create a new component instance.
     *
     * @param string|null $wrapper
     * @param string|null $tag
     * @param string|null $ariaLabel
     * @param array $items
     * @param string|null $variant
     * @param string|null $itemTag
     */
    public function __construct(
        ?string $wrapper = null,
        ?string $tag = "ol",
        ?string $ariaLabel = null,
        array $items = null,
        ?string $variant = null,
        ?string $itemTag = "li"
    )
    {
        $this->wrapper = $wrapper;
        $this->tag = $tag ?? "ol";
        $this->ariaLabel = $ariaLabel;
        $this->items = $items;
        $this->variant = $variant ? "bg-$variant" : '';
        $this->dottedItems = $this->items ? Arr::dot($this->items) : [];
        $this->itemTag = $itemTag ?? "li";
    }

    public function getValue($key)
    {
        return isset($this->dottedItems[$key]) ? $this->dottedItems[$key] : null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.breadcrumb');
    }

}
