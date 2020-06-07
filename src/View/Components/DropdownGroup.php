<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DropdownGroup extends Component
{
    public ?string $id;
    public ?string $header;
    public ?string $headerTag;
    public ?string $headerVariant;
    public $headerClasses;
    public ?string $ariaDescribedby;

    public array $attrs = [
        "class" => [
            "list-unstyled"
        ],
        "role" => "group"
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string|null $header
     * @param string|null $headerTag
     * @param string|null $headerVariant
     * @param null $headerClasses
     * @param string|null $ariaDescribedby
     */
    public function __construct(
        ?string $id = null,
        ?string $header = null,
        ?string $headerTag = null,
        ?string $headerVariant = null,
        $headerClasses = null,
        ?string $ariaDescribedby = null
    )
    {
        $this->id = $id;
        $this->header = $header;
        $this->headerTag = $headerTag;
        $this->headerVariant = $headerVariant;
        $this->headerClasses = $headerClasses;
        $this->ariaDescribedby = $ariaDescribedby;

        if ($this->ariaDescribedby) {
            $this->attrs["ara-describedby"] = $this->ariaDescribedby;
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
        return view('laravel-bootstrap::components.dropdown-group');
    }
}
