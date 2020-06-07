<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class Col
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/layout#comp-ref-b-col-props
 */
class Col extends Component
{
    public string $tag;                //'div'	    Specify the HTML tag to render instead of the default tag
    private bool $col;                  //false 	When true makes an equal width column grid cell spans for xs and up breakpoints
    private ?string $cols;              //null	    Number of columns the grid cell spans for xs and up breakpoints
    private ?string $sm;                //false 	Number of columns the grid cell spans for sm and up breakpoints
    private ?string $md;                //false 	Number of columns the grid cell spans for md and up breakpoints
    private ?string $lg;                //false 	Number of columns the grid cell spans for lg and up breakpoints
    private ?string $xl;                //false 	Number of columns the grid cell spans for xl and up breakpoints
    private ?string $offset;            //null	    Number of columns the grid cell is offset for xs and up breakpoints
    private ?string $offsetSm;          //null	    Number of columns the grid cell is offset for sm and up breakpoints
    private ?string $offsetMd;          //null  	Number of columns the grid cell is offset for md and up breakpoints
    private ?string $offsetLg;          //null	    Number of columns the grid cell is offset for lg and up breakpoints
    private ?string $offsetXl;          //null	    Number of columns the grid cell is offset for xl and up breakpoints
    private ?string $order;             //null	    Flex order of the grid cell for xs and up breakpoints
    private ?string $orderSm;           //null	    Flex order of the grid cell for sm and up breakpoints
    private ?string $orderMd;           //null	    Flex order of the grid cell for md and up breakpoints
    private ?string $orderLg;           //null	    Flex order of the grid cell for lg and up breakpoints
    private ?string $orderXl;           //null	    Flex order of the grid cell for xl and up breakpoints
    private ?string $alignSelf;         //null	    Vertical alignment of the grid cell with respect to the row: 'start', 'center', 'end', 'baseline', or 'stretch'

    private bool $hasCols;
    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param bool|null $col
     * @param string|null $cols
     * @param string|null $sm
     * @param string|null $md
     * @param string|null $lg
     * @param string|null $xl
     * @param string|null $offset
     * @param string|null $offsetSm
     * @param string|null $offsetMd
     * @param string|null $offsetLg
     * @param string|null $offsetXl
     * @param string|null $order
     * @param string|null $orderSm
     * @param string|null $orderMd
     * @param string|null $orderLg
     * @param string|null $orderXl
     * @param string|null $alignSelf
     */
    public function __construct(
        ?string $tag = null,
        ?bool $col = false,
        ?string $cols = null,
        ?string $sm = null,
        ?string $md = null,
        ?string $lg = null,
        ?string $xl = null,
        ?string $offset = null,
        ?string $offsetSm = null,
        ?string $offsetMd = null,
        ?string $offsetLg = null,
        ?string $offsetXl = null,
        ?string $order = null,
        ?string $orderSm = null,
        ?string $orderMd = null,
        ?string $orderLg = null,
        ?string $orderXl = null,
        ?string $alignSelf = null
    )
    {
        $this->tag = $tag ?? "div";
        $this->col = !!$col;
        $this->cols = $cols;
        $this->sm = $sm;
        $this->md = $md;
        $this->lg = $lg;
        $this->xl = $xl;

        $this->hasCols = !!($cols || $sm || $md || $lg || $xl);


        $this->offset = $offset;
        $this->offsetSm = $offsetSm;
        $this->offsetMd = $offsetMd;
        $this->offsetLg = $offsetLg;
        $this->offsetXl = $offsetXl;
        $this->order = $order;
        $this->orderSm = $orderSm;
        $this->orderMd = $orderMd;
        $this->orderLg = $orderLg;
        $this->orderXl = $orderXl;
        $this->alignSelf = $alignSelf;
        if ($this->col) {
            $this->attrs["class"][] = "col";
        }
        if (!$this->hasCols) {
            if (!in_array("col", $this->attrs["class"])) {
                $this->attrs["class"][] = "col";
            }
        }
        if ($this->cols) {
            $this->attrs["class"][] = "col-$this->cols";
        }
        if ($this->sm) {
            $this->attrs["class"][] = "col-sm-$this->sm";
        }
        if ($this->md) {
            $this->attrs["class"][] = "col-md-$this->md";
        }
        if ($this->lg) {
            $this->attrs["class"][] = "col-lg-$this->lg";
        }
        if ($this->xl) {
            $this->attrs["class"][] = "col-xl-$this->xl";
        }
        if ($this->offset) {
            $this->attrs["class"][] = "offset-$this->offset";
        }
        if ($this->offsetSm) {
            $this->attrs["class"][] = "offset-sm-$this->offsetSm";
        }
        if ($this->offsetMd) {
            $this->attrs["class"][] = "offset-md-$this->offsetMd";
        }
        if ($this->offsetLg) {
            $this->attrs["class"][] = "offset-lg-$this->offsetLg";
        }
        if ($this->offsetXl) {
            $this->attrs["class"][] = "offset-xl-$this->offsetXl";
        }
        if ($this->order) {
            $this->attrs["class"][] = "order-$this->order";
        }
        if ($this->orderSm) {
            $this->attrs["class"][] = "order-sm-$this->orderSm";
        }
        if ($this->orderMd) {
            $this->attrs["class"][] = "order-md-$this->orderMd";
        }
        if ($this->orderLg) {
            $this->attrs["class"][] = "order-lg-$this->orderLg";
        }
        if ($this->orderXl) {
            $this->attrs["class"][] = "order-xl-$this->orderXl";
        }
        if ($this->alignSelf) {
            $this->attrs["class"][] = "align-self-$this->alignSelf";
        }
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
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
