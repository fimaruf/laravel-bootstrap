<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class ButtonGroup
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/button-group#component-reference
 */
class ButtonGroup extends Component
{
    public bool $vertical;          //false             When set, rendered the button group in vertical mode
    public ?string $size;           //                  Set the size of the component's appearance. 'sm', 'md' (default), or 'lg'
    public string $tag;             //div               Specify the HTML tag to render instead of the default tag
    public ?string $ariaRole;       //group             Sets the ARIA attribute 'role' to a specific value
    public ?string $ariaLabel;
    public ?string $type;

    public array $classList;
    public array $attrs;

    /**
     * Create a new component instance.
     * @param bool $vertical
     * @param string|null $size
     * @param string|null $tag
     * @param string|null $ariaRole
     * @param string|null $ariaLabel
     * @param string|null $type
     */
    public function __construct(
        bool $vertical = false,
        ?string $size = null,
        ?string $tag = 'div',
        ?string $ariaRole = "group",
        ?string $ariaLabel = null,
        ?string $type = "button"
    )
    {
        $this->vertical = $vertical;
        $this->size = $size;
        $this->tag = $tag ?? "div";
        $this->ariaRole = $ariaRole ?? 'group';
        $this->ariaLabel = $ariaLabel;
        $this->type = "button";

        $this->classList = [
            $this->vertical ? 'btn-group-vertical' : 'btn-group'
        ];
        if ($this->size) {
            $this->classList[] = "btn-group-$this->size";
        }

        $this->attrs = [
            "class" => join(" ", $this->classList),
            "role" => $this->ariaRole
        ];

        if ($this->ariaLabel) {
            $this->attrs["aria-label"] = $this->ariaLabel;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<div {{$attributes->merge($attrs)}}>
    {{$slot}}
</div>
blade;
    }
}
