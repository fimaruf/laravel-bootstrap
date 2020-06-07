<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class Row
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/layout#comp-ref-b-row
 */
class Row extends Component
{
    public string $tag;             //div       Specify the HTML tag to render instead of the default tag
    public bool $noGutters;         //false     When set, removes the margin from the row and removes the padding from the child columns
    public ?string $alignV;         //null      Vertical alignment of all columns in a row: 'start', 'center', 'end', 'baseline', or 'stretch'
    public ?string $alignH;         //null      Horizontal alignment/spacing of all columns: 'start', 'center', 'end', 'around', or 'between'
    public ?string $alignContent;   //null      Align columns items together on the cross axis: 'start', 'center', 'end', 'around', 'between' or 'stretch'. Has no effect on single rows of items
    public ?string $cols;           //null      The number row columns to create at the 'xs' breakpoint. Requires Bootstrap v4.4 CSS
    public ?string $colsSm;         //null      The number row columns to create at the 'sm' breakpoint. Requires Bootstrap v4.4 CSS
    public ?string $colsMd;         //null      The number row columns to create at the 'md' breakpoint. Requires Bootstrap v4.4 CSS
    public ?string $colsLg;         //null      The number row columns to create at the 'lg' breakpoint. Requires Bootstrap v4.4 CSS
    public ?string $colsXl;         //null      The number row columns to create at the 'xl' breakpoint. Requires Bootstrap v4.4 CSS
    public array $attrs = [
        "class" => ["row"]
    ];

    /**
     * Create a new component instance
     * @param string|null $tag
     * @param bool|null $noGutters
     * @param string|null $alignV
     * @param string|null $alignH
     * @param string|null $alignContent
     * @param string|null $cols
     * @param string|null $colsSm
     * @param string|null $colsMd
     * @param string|null $colsLg
     * @param string|null $colsXl
     */
    public function __construct(
        ?string $tag = null,
        ?bool $noGutters = false,
        ?string $alignV = null,
        ?string $alignH = null,
        ?string $alignContent = null,
        ?string $cols = null,
        ?string $colsSm = null,
        ?string $colsMd = null,
        ?string $colsLg = null,
        ?string $colsXl = null
    )
    {
        $this->tag = $tag ?? "div";
        $this->noGutters = !!$noGutters;
        $this->alignV = $alignV;
        $this->alignH = $alignH;
        $this->alignContent = $alignContent;
        $this->cols = $cols;
        $this->colsSm = $colsSm;
        $this->colsMd = $colsMd;
        $this->colsLg = $colsLg;
        $this->colsXl = $colsXl;
        if ($this->noGutters) {
            $this->attrs["class"][] = "no-gutters";
        }
        if ($this->cols) {
            $this->attrs["class"][] = "row-cols-$this->cols";
        }
        if ($this->colsSm) {
            $this->attrs["class"][] = "row-cols-$this->colsSm";
        }
        if ($this->colsMd) {
            $this->attrs["class"][] = "row-cols-$this->colsMd";
        }
        if ($this->colsLg) {
            $this->attrs["class"][] = "row-cols-$this->colsLg";
        }
        if ($this->colsXl) {
            $this->attrs["class"][] = "row-cols-$this->colsXl";
        }
        if ($this->alignV) {
            $this->attrs["class"][] = "align-items-$this->alignV";
        }
        if ($this->alignH) {
            $this->attrs["class"][] = "justify-content-$this->alignH";
        }
        if ($this->alignContent) {
            $this->attrs["class"][] = "align-content-$this->alignContent";
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
