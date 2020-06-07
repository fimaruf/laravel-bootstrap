<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class ButtonToolbar
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/button-toolbar#component-reference
 */
class ButtonToolbar extends Component
{
    public string $tag;
    public bool $justify;       //false         Make the toolbar span the maximum available width, by increasing spacing between the button groups, input groups and dropdowns
    //not implemented yet. Just making it for api reference.
    public bool $keyNav;        //false         When set, enabled keyboard navigation mode for the toolbar. Do not set this prop when the toolbar has inputs

    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param bool $justify
     * @param bool $keyNav
     */
    public function __construct(
        ?string $tag = "div",
        bool $justify = false,
        bool $keyNav = false
    )
    {
        $this->tag = $tag ?? "div";
        $this->justify = !!$justify;
        $this->keyNav = !!$keyNav;
        $this->attrs = [
            "class" => ["btn-toolbar"],
            "role" => "toolbar"
        ];
        if ($this->justify) {
            $this->attrs['class'][] = "justify-content-between";
        }
        if ($this->keyNav) {
            $this->attrs['tabindex'] = 0;
        }
        $this->attrs['class'] = join(" ", $this->attrs['class']);
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
