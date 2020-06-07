<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Embed extends Component
{
    public string $type;        //'iframe'	    Type of embed. Possible values are 'iframe', 'video', 'embed' and 'object'
    public string $tag;         //'div'	        Specify the HTML tag to render instead of the default tag
    public string $aspect;      //16by9'	    Aspect ratio of the embed. Supported values are '16by9', '21by9', '4by3', and '1by1' and are translated to CSS classes. Refer to the docs for more details


    /**
     * Create a new component instance.
     *
     * @param string|null $type
     * @param string|null $tag
     * @param string|null $aspect
     */
    public function __construct(
        ?string $type = null,
        ?string $tag = null,
        ?string $aspect = null
    )
    {
        $this->type = $type ?? "iframe";
        $this->tag = $tag ?? "div";
        $this->aspect = $aspect ?? "16by9";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.embed');
    }
}
