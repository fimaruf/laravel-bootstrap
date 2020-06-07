<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Jumbotron extends Component
{
    private bool $fluid;
    public ?string $containerFluid;
    public ?string $containerClass = null;
    public ?string $header;
    public ?string $headerHtml;
    public ?string $headerTag;
    public ?string $headerLevel;
    public ?string $lead;
    public ?string $leadHtml;
    public ?string $leadTag;
    public ?string $tag;
    private ?string $bgVariant;
    private ?string $borderVariant;
    private ?string $textVariant;

    public bool $shouldWrap;
    public array $attrs = [
        "class" => ["jumbotron"]
    ];
    public array $headerAttrs = [
        "class" => []
    ];
    public array $leadAttrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param bool|null $fluid
     * @param string|null $containerFluid Handled by Container.
     * @param array|null $containerClass
     * @param string|null $header
     * @param string|null $headerHtml
     * @param string|null $headerTag
     * @param string|null $headerLevel
     * @param string|null $lead
     * @param string|null $leadHtml
     * @param string|null $leadTag
     * @param string|null $tag
     * @param string|null $bgVariant
     * @param string|null $borderVariant
     * @param string|null $textVariant
     */
    public function __construct(
        ?bool $fluid = null,
        ?string $containerFluid = null,
        ?array $containerClass = null,
        ?string $header = null,
        ?string $headerHtml = null,
        ?string $headerTag = null,
        ?string $headerLevel = null,
        ?string $lead = null,
        ?string $leadHtml = null,
        ?string $leadTag = null,
        ?string $tag = null,
        ?string $bgVariant = null,
        ?string $borderVariant = null,
        ?string $textVariant = null
    )
    {
        $this->shouldWrap = false;

        $this->fluid = !!$fluid;
        $this->containerFluid = $containerFluid;
        $this->header = $header;
        $this->headerHtml = $headerHtml;
        $this->headerTag = $headerTag ?? "h1";
        $this->headerLevel = $headerLevel ?? 3;
        $this->lead = $lead;
        $this->leadHtml = $leadHtml;
        $this->leadTag = $leadTag ?? "p";
        $this->tag = $tag ?? "div";
        $this->bgVariant = $bgVariant;
        $this->borderVariant = $borderVariant;
        $this->textVariant = $textVariant;

        if ($this->fluid) {
            $this->attrs['class'][] = "jumbotron-fluid";
            $this->shouldWrap = true;
        }
        if ($this->bgVariant) {
            $this->attrs["class"][] = "bg-$this->bgVariant";
        }
        if ($this->borderVariant) {
            if (!in_array("border", $this->attrs["class"])) {
                $this->attrs["class"][] = "border";
            }
            $this->attrs["class"][] = "border-$this->borderVariant";
        }
        if ($this->textVariant) {
            $this->attrs["class"][] = "text-$this->textVariant";
        }
        $this->headerAttrs["class"][] = "display-$this->headerLevel";
        $this->leadAttrs["class"][] = "lead";
        if ($containerClass) {
            $this->containerClass = is_array($containerClass) ? join(" ", $containerClass) : $containerClass;
        }

        $this->attrs["class"] = join(" ", $this->attrs["class"]);
        $this->headerAttrs["class"] = join(" ", $this->headerAttrs["class"]);
        $this->leadAttrs["class"] = join(" ", $this->leadAttrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.jumbotron');
    }
}
