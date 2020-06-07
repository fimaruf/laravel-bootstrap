<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Progress extends Component
{
    public ?string $variant;
    public bool $striped;
    public bool $animated;
    public ?string $height;
    public int $precision;
    public bool $showProgress;
    public bool $showValue;
    public int $max;
    public ?float $value;
    public ?string $label;
    public array $attrs = [
        "class" => [
            "progress"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $variant
     * @param bool|null $striped
     * @param bool|null $animated
     * @param string|null $height
     * @param int|null $precision
     * @param bool|null $showProgress
     * @param bool|null $showValue
     * @param int|null $max
     * @param float|null $value
     * @param string|null $label
     */
    public function __construct(
        ?string $variant = null,
        ?bool $striped = null,
        ?bool $animated = null,
        ?string $height = null,
        ?int $precision = null,
        ?bool $showProgress = null,
        ?bool $showValue = null,
        ?int $max = null,
        ?float $value = null,
        ?string $label = null
    )
    {
        $this->variant = $variant;
        $this->striped = !!$striped;
        $this->animated = !!$animated;
        $this->height = $height;
        $this->precision = $precision ?? 0;
        $this->showProgress = $showProgress === null || $showProgress === true;
        $this->showValue = !!$showValue;
        $this->max = $max ?? 100;
        $this->value = $value;
        $this->label = $label;

        if ($this->height) {
            $this->attrs["style"] = "height:{$this->height}px";
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
        return view('laravel-bootstrap::components.progress');
    }
}
