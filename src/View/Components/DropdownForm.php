<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DropdownForm extends Component
{
    public ?string $id;
    public bool $inline;
    public bool $novalidate;
    public bool $validated;
    public bool $disabled;
    public $formClass;

    public array $attrs = [
        "class" => [
            "b-dropdown-form"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param bool $inline
     * @param bool $novalidate
     * @param bool $validated
     * @param bool $disabled
     * @param bool $formClass
     */
    public function __construct(
        ?string $id = null,
        bool $inline = false,
        bool $novalidate = false,
        bool $validated = false,
        bool $disabled = false,
        $formClass = false
    )
    {
        $this->id = $id;
        $this->inline = !!$inline;
        $this->novalidate = !!$novalidate;
        $this->validated = !!$validated;
        $this->disabled = !!$disabled;
        $this->formClass = is_array($formClass) ? $formClass : explode(" ", $formClass);

        if ($this->id) {
            $this->attrs["id"] = $this->id;
        }

        $this->formClass = implode(" ", $this->formClass);
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.dropdown-form');
    }
}
