<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class ProgressBar extends Component
{
    public float $value;
    public int $max;
    public ?int $precision;
    public ?string $variant;
    public ?bool $striped;
    public ?bool $animated;
    public ?bool $showProgress;
    public ?bool $showValue;
    public ?string $label;

    public array $attrs = [
        "class" => [
            "progress-bar"
        ],
        "role" => "progressbar",
        "aria-valuemin" => "0",
        "aria-valuemax" => "100"
    ];

    /**
     * Create a new component instance.
     *
     * @param float $value
     * @param int|null $max
     * @param int|null $precision
     * @param string|null $variant
     * @param bool|null $striped
     * @param bool|null $animated
     * @param bool|null $showProgress
     * @param bool|null $showValue
     * @param string|null $label
     */
    public function __construct(
        float $value,
        ?int $max = null,
        ?int $precision = null,
        ?string $variant = null,
        ?bool $striped = null,
        ?bool $animated = null,
        ?bool $showProgress = null,
        ?bool $showValue = null,
        ?string $label = null
    )
    {
        $this->precision = $precision ?? 0;
        $this->value = round($value === null ? 50 : $value, $this->precision);
        $this->max = $max ?? 100;
        $this->variant = $variant;
        $this->striped = !!$striped;
        $this->animated = !!$animated;
        $this->showProgress = !!$showProgress;
        $this->showValue = !!$showValue;
        $this->label = $label;

        if ($this->variant) {
            $this->attrs["class"][] = "bg-$this->variant";
        }
        if ($this->striped) {
            $this->attrs["class"][] = "progress-bar-striped";
        }
        if ($this->animated) {
            $this->attrs["class"][] = "progress-bar-animated";
        }
        $this->attrs["style"] = "width:{$this->value}%";
        $this->attrs["aria-valuenow"] = $this->value;
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.progress-bar');
    }
}
