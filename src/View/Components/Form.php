<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    private string $id;
    private bool $inline;
    private bool $novalidate;
    private bool $validated;

    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param bool|null $inline
     * @param bool|null $novalidate
     * @param bool|null $validated
     */
    public function __construct(
        ?string $id = null,
        ?bool $inline = null,
        ?bool $novalidate = null,
        ?bool $validated = null
    )
    {
        $this->id = $id ?? uniqid();
        $this->inline = !!$inline;
        $this->novalidate = !!$novalidate;
        $this->validated = !!$validated;
        if ($this->inline) {
            $this->attrs["class"][] = "form-inline";
        }
        if ($this->validated) {
            $this->attrs["class"][] = "was-validated";
        }
        $this->attrs["novalidate"] = $this->novalidate;
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.form');
    }
}
