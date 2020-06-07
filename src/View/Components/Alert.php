<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class Alert
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/alert#component-reference
 */
class Alert extends Component
{
    public ?string $role;                            //alert            Alert Element's role
    public ?string $variant;                         //info              Applies one of the Bootstrap theme color variants to the component
    public bool $dismissible;                        //false             When set, enables the dismiss close button
    public ?string $dismissLabel;                    //Close             Value for the 'aria-label' attribute on the dismiss button
    public ?string $heading;
    public ?string $tag;
    public ?string $dismissibleClass;
    public bool $show;                              //false             When set, shows the alert. Set to a number (seconds) to show and automatically dismiss the alert after the number of seconds has elapsed
    public bool $fade;                              //false             When set to 'true', enables the fade animation/transition on the component
    public array $classList;
    public string $headingTag;
    public string $headingClass;

    /**
     * Create a new component instance.
     *
     * @param bool $show
     * @param bool $fade
     * @param string|null $role
     * @param string|null $dismissLabel
     * @param string $variant primary|secondary|success|danger|warning|info|light|dark
     * @param string $tag
     * @param bool $dismissible
     * @param array|string|null $dismissibleClass
     * @param string|null $heading
     * @param string $headingTag
     * @param array|string|null $headingClass
     */
    public function __construct(
        bool $show = false,
        bool $fade = false,
        string $role = "alert",
        string $dismissLabel = "Close",
        string $variant = 'info',
        string $tag = "div",
        bool $dismissible = false,
        $dismissibleClass = null,
        string $heading = null,
        string $headingTag = "h4",
        $headingClass = null
    )
    {
        $this->show = !!$show;
        $this->fade = !!$fade;
        $this->role = $role ?? "alert";
        $this->variant = $variant ?? "info";
        $this->tag = $tag ?? "div";
        $this->dismissible = !!$dismissible;
        $this->dismissLabel = $dismissLabel;
        $this->dismissibleClass = is_array($dismissibleClass) ? join(" ", $dismissibleClass) : $dismissibleClass;

        $this->heading = $heading;
        $this->headingTag = $headingTag ?? "h4";

        $this->headingClass = join(" ", ["alert-heading", (is_array($headingClass) ? join(" ", $headingClass) : $headingClass)]);

        $this->classList = ["alert", "alert-$this->variant"];
        if ($this->dismissible) {
            $this->classList[] = "alert-dismissible";
        }
        if (!$this->show) {
            $this->classList[] = "d-none";
        }
        if ($this->fade) {
            $this->classList[] = "fade";
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
                <{{$tag}} role="{{$role}}" {{$attributes->merge(['class'=>join(" " ,$classList)])}}>
                @if($heading)<{{$headingTag}} class="{{$headingClass}}">{{$heading}}</{{$headingTag}}>@endif
                {{$slot}}
                @if($dismissible)
                    <x-dismissible dismiss="alert" :aria-label="$dismissLabel"/>
                @endif
                </{{$tag}}>
                blade;

//        return view('components.alert');
    }
}
