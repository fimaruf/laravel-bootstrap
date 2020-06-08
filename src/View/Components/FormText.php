<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormText extends Component
{
    public ?string $id;
    public string $tag;
    public ?string $textVariant;
    public bool $inline;
    public array $attrs = [
        "class" => [

        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string|null $tag
     * @param string|null $textVariant
     * @param bool $inline
     */
    public function __construct(
        ?string $id = null,
        ?string $tag = "small",
        ?string $textVariant = null,
        bool $inline = false
    )
    {
        $this->id = $id;
        $this->tag = $tag ?? "span";
        $this->textVariant = $textVariant ?? "muted";
        $this->inline = !!$inline;
        if (!$this->inline) {
            $this->attrs["class"][] = "form-text";
        }
        if ($this->id) {
            $this->attrs["id"] = $this->id;
        }
        $this->attrs["class"][] = "text-$this->textVariant";

        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<{{$tag}} {{$attributes->merge($attrs)}}>{{$slot}}</{{$tag}}>
blade;
    }
}
