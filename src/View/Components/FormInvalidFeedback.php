<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormInvalidFeedback extends Component
{
    public bool $state;
    public ?string $content;
    public ?string $role;
    public ?string $ariaLive;
    public ?bool $ariaAtomic;
    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @param bool $state
     * @param string|null $content
     * @param string|null $role
     * @param string|null $ariaLive
     * @param bool|null $ariaAtomic
     */
    public function __construct(
        ?bool $state = false,
        ?string $content = null,
        ?string $role = null,
        ?string $ariaLive = null,
        ?bool $ariaAtomic = true
    )
    {
        $this->state = !!$state;
        $this->content = $content;
        $this->role = $role ?? "alert";
        $this->ariaLive = $ariaLive ?? "assertive";
        $this->ariaAtomic = !!$ariaAtomic;
        $this->attrs = [
            "class" => [
                "invalid-feedback"
            ],
            "role" => $this->role,
            "aria-atomic" => $this->ariaAtomic ? 'true' : 'false',
            "aria-live" => $this->ariaLive
        ];
        if ($this->state) {
            $this->attrs['class'][] = "d-block";
        } else {
            $this->attrs['class'][] = "d-none";
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
<div {{$attributes->merge($attrs)}}>
    @if($content) {{$content}} @else {{$slot}} @endif
</div>
blade;

    }
}
