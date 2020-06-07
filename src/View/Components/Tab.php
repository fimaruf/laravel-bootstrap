<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Tab extends Component
{
    public ?string $id;
    public bool $active;
    public string $tag;
    public ?string $buttonId;
    public string $title;
//    public ?array $titleItemClass;
//    public ?array $titleLinkClass;
//    public ?array $titleLinkAttributes;
    public bool $disabled;
    public bool $noBody;

    public array $attrs = [
        "class" => [
            "tab-pane"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param bool|null $active
     * @param string|null $tag
     * @param string|null $buttonId
     * @param string|null $title
     * @param string|null $titleItemClass
     * @param string|null $titleLinkClass
     * @param array|null $titleLinkAttributes
     * @param bool|null $disabled
     * @param bool|null $noBody
     */
    public function __construct(
        ?string $id = null,
        bool $active = null,
        string $tag = null,
        ?string $buttonId = null,
        ?string $title = null,
        ?array $titleItemClass = null,
//        ?string $titleLinkClass = null,
//        ?array $titleLinkAttributes = null,
        bool $disabled = null,
        bool $noBody = null
    )
    {
        $this->id = $id ?? uniqid();
        $this->active = !!$active;
        $this->tag = $tag ?? "div";
        $this->buttonId = $buttonId ?? uniqid();
        $this->title = $title ?? '';
//        $this->titleItemClass = is_array($titleItemClass) ? $titleItemClass : explode(" ", $titleItemClass) ?? [];
//        $this->titleLinkAttributes = is_array($titleLinkAttributes) ? $titleLinkAttributes : implode(" ", $titleLinkAttributes) ?? [];
        $this->disabled = !!$disabled;
        $this->noBody = !!$noBody;
        $this->attrs["id"] = $this->id;
        $this->attrs["data-toggle"] = "tab";
        $this->attrs["role"] = "tabpanel";
        $this->attrs["aria-labelledby"] = $this->id . "-tab";

        if ($this->active) {
            $this->attrs["class"][] = "active";
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
        return view('laravel-bootstrap::components.tab');
    }
}
