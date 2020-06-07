<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class ListGroup extends Component
{
    public string $tag;
    private bool $flush;
    private bool $horizontal;

    //for items : works only when there are items
    private ?string $itemTextField;
    private ?string $itemActiveField;
    private ?string $itemDisabledField;
    public ?string $itemVariantField;
    public ?string $itemHrefField;
    public ?string $itemRelField;
    public ?string $itemTargetField;
    public ?bool $itemExactField;

    public ?array $items;
    public ?string $itemTag;
    public ?bool $itemButton;
    public ?string $itemActiveClass;
    public ?string $itemExactActiveClass;

    public array $attrs = [
        "class" => ["list-group"]
    ];

    /**
     * Create a new component instance.
     * @param string|null $tag
     * @param bool|null $flush
     * @param bool|null $horizontal
     * @param string|null $itemTextField
     * @param string|null $itemActiveField
     * @param string|null $itemDisabledField
     * @param string|null $itemVariantField
     * @param string|null $itemHrefField
     * @param string|null $itemRelField
     * @param string|null $itemTargetField
     * @param array|null $items
     * @param string|null $itemTag
     * @param bool|null $itemButton
     * @param string|null $itemActiveClass
     * @param string|null $itemExactField
     * @param string|null $itemExactActiveClass
     */
    public function __construct(
        ?string $tag = null,
        ?bool $flush = false,
        ?bool $horizontal = false,

        ?string $itemTextField = null,
        ?string $itemActiveField = null,
        ?string $itemDisabledField = null,
        ?string $itemVariantField = null,
        ?string $itemHrefField = null,
        ?string $itemRelField = null,
        ?string $itemTargetField = null,
        ?array $items = null,
        ?string $itemTag = null,
        ?bool $itemButton = false,
        ?string $itemActiveClass = null,
        ?string $itemExactField = null,
        ?string $itemExactActiveClass = null
    )
    {
        $this->tag = $tag ?? "div";
        $this->flush = !!$flush;
        $this->horizontal = !!$horizontal;

        //for items
        $this->itemTextField = $itemTextField ?? 'text';
        $this->itemActiveField = $itemActiveField ?? 'active';
        $this->itemDisabledField = $itemDisabledField ?? 'disabled';
        $this->itemVariantField = $itemVariantField ?? "variant";
        $this->itemHrefField = $itemHrefField ?? "href";
        $this->itemRelField = $itemRelField ?? "rel";
        $this->itemTargetField = $itemTargetField ?? "target";

        $this->items = $items;
        $this->itemTag = $itemTag;
        $this->itemButton = $itemButton;
        $this->itemActiveClass = $itemActiveClass;
        $this->itemExactField = $itemExactField;
        $this->itemExactActiveClass = $itemExactActiveClass;

        if ($this->flush) {
            $this->attrs["class"][] = "list-group-flush";
        }

        if ($this->horizontal) {
            $this->attrs["class"][] = "list-group-horizontal";
        }
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
    }

    public function getItemValue($item, string $key)
    {
        if (!isset($item[$this->$key])) {
            return null;
        }
        return $item[$this->$key];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.list-group');
    }
}
