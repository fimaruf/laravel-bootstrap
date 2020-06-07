<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public ?string $id;
    public ?string $size;
    public ?string $prepend;
    public ?string $prependHtml;
    public ?string $append;
    public ?string $appendHtml;
    public string $tag;
    public array $attrs = [
        "class" => [
            "input-group"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string|null $size
     * @param string|null $prepend
     * @param string|null $prependHtml
     * @param string|null $append
     * @param string|null $appendHtml
     * @param string $tag
     */
    public function __construct(
        ?string $id = null,
        ?string $size = null,
        ?string $prepend = null,
        ?string $prependHtml = null,
        ?string $append = null,
        ?string $appendHtml = null,
        string $tag = "div"
    )
    {
        $this->id = $id;
        $this->size = $size;
        $this->prepend = $prepend;
        $this->prependHtml = $prependHtml;
        $this->append = $append;
        $this->appendHtml = $appendHtml;
        $this->tag = $tag ?? "div";

        if ($this->id) {
            $this->attrs["id"] = $id;
        }
        if ($this->size) {
            $this->attrs["class"][] = "input-group-$this->size";
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
        return view('components.input-group');
    }
}
