<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Spinner extends Component
{
    public string $type;
    public ?string $label;
    public ?string $variant;
    public bool $small;
    public string $role;
    public string $tag;
    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $type
     * @param string|null $label
     * @param string|null $variant
     * @param bool|null $small
     * @param string|null $role
     * @param string|null $tag
     */
    public function __construct(
        ?string $type = null,
        ?string $label = null,
        ?string $variant = null,
        ?bool $small = null,
        ?string $role = null,
        ?string $tag = null
    )
    {
        $this->type = $type ?? "border";
        $this->label = $label;
        $this->variant = $variant;
        $this->small = !!$small;
        $this->role = $role ?? "status";
        $this->tag = $tag ?? "span";

        $this->attrs["class"][] = "spinner-$this->type";
        if ($this->small) {
            $this->attrs["class"][] = "spinner-{$this->type}-sm";
        }
        if ($this->variant) {
            $this->attrs["class"][] = "text-$this->variant";
        }
        $this->attrs["role"] = $this->role;
        //https://bootstrap-vue.org/docs/components/spinner#spinner-accessibility
        if (!$this->label) {
            $this->attrs["aria-hidden"] = "true";
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
        return view('laravel-bootstrap::components.spinner');
    }
}

;
