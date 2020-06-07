<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormGroupLabel extends Component
{
    public ?string $for;
    public ?string $size;
    public bool $srOnly;
    public ?int $cols;
    public ?int $colsSm;
    public ?int $colsMd;
    public ?int $colsLg;
    public ?int $colsXl;

    public ?string $align;
    public ?string $alignSm;
    public ?string $alignMd;
    public ?string $alignLg;
    public ?string $alignXl;
    private bool $hasCols;
    /**
     * @var string[][]
     */
    public array $attrs;

    /**
     * Create a new component instance.
     * @param string|null $for
     * @param string|null $size
     * @param bool $srOnly
     * @param int|null $cols
     * @param int|null $colsSm
     * @param int|null $colsMd
     * @param int|null $colsLg
     * @param int|null $colsXl
     * @param string|null $align
     * @param string|null $alignSm
     * @param string|null $alignMd
     * @param string|null $alignLg
     * @param string|null $alignXl
     */
    public function __construct(
        ?string $for = null,
        ?string $size = null,
        bool $srOnly = false,

        ?int $cols = 0,
        ?int $colsSm = 0,
        ?int $colsMd = 0,
        ?int $colsLg = 0,
        ?int $colsXl = 0,

        ?string $align = null,
        ?string $alignSm = null,
        ?string $alignMd = null,
        ?string $alignLg = null,
        ?string $alignXl = null
    )
    {
        $this->for = $for;
        $this->size = $size;
        $this->srOnly = !!$srOnly;

        $this->cols = $cols ?? 0;
        $this->colsSm = $colsSm ?? 0;
        $this->colsMd = $colsMd ?? 0;
        $this->colsLg = $colsLg ?? 0;
        $this->colsXl = $colsXl ?? 0;

        $this->align = $align;
        $this->alignSm = $alignSm;
        $this->alignMd = $alignMd;
        $this->alignLg = $alignLg;
        $this->alignXl = $alignXl;
        $this->hasCols = !!$this->cols || !!$this->colsSm || !!$this->colsMd || !!$this->colsLg || !!$this->colsXl;
        $this->attrs = [
            "class" => []
        ];
        if ($this->for) {
            $this->attrs["for"] = $this->for;
        }
        if ($this->srOnly) {
            $this->attrs["class"][] = "sr-only";
        }
        if ($this->size) {
            $this->attrs["class"][] = "col-form-label-$this->size";
        }
        if ($this->align) {
            $this->attrs["class"][] = "text-$this->align";
        }
        if ($this->alignSm) {
            $this->attrs["class"][] = "text-sm-$this->alignSm";
        }
        if ($this->alignMd) {
            $this->attrs["class"][] = "text-md-$this->alignMd";
        }
        if ($this->alignLg) {
            $this->attrs["class"][] = "text-lg-$this->alignLg";
        }
        if ($this->alignXl) {
            $this->attrs["class"][] = "text-xl-$this->alignXl";
        }
        if ($this->hasCols) {
            $this->attrs["class"][] = "col-form-label";
        }
        if ($this->cols) {
            $this->attrs["class"][] = "col-$this->cols";
        }
        if ($this->colsSm) {
            $this->attrs["class"][] = "col-sm-$this->colsSm";
        }
        if ($this->colsMd) {
            $this->attrs["class"][] = "col-md-$this->colsMd";
        }
        if ($this->colsLg) {
            $this->attrs["class"][] = "col-lg-$this->colsLg";
        }
        if ($this->colsXl) {
            $this->attrs["class"][] = "col-xl-$this->colsXl";
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
<label {{$attributes->merge($attrs)}}>{{$slot}}</label>
blade;
    }
}
