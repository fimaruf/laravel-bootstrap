<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Toast extends Component
{
    public ?string $id;
    public ?string $title;
    public ?string $subTitle;
    public ?string $header;
    public bool $visible;
    public ?string $variant;
    public int $autoHideDelay;
    public bool $noCloseButton;
    public bool $noFade;
    public bool $noHoverPause;
    public bool $solid;
    public $headerClass;
    public $bodyClass;
    public bool $static;
    public ?string $href;
    public bool $autoHide;

    //attributes
    public array $attrs = [
        "class" => [
            "toast"
        ],
        "role" => "alert",
        "aria-live" => "assertive",
        "aria-atomic" => "true"
    ];


    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string|null $title
     * @param string|null $subTitle
     * @param string|null $header
     * @param bool|null $visible
     * @param string|null $variant
     * @param bool|null $autoHide
     * @param int|null $autoHideDelay
     * @param bool|null $noCloseButton
     * @param bool|null $noFade
     * @param bool|null $noHoverPause
     * @param bool|null $solid
     * @param null $toastClass
     * @param null $headerClass
     * @param null $bodyClass
     * @param bool|null $static
     * @param string|null $href
     */
    public function __construct(
        ?string $id = null,
        ?string $title = null,
        ?string $subTitle = null,
        ?string $header = null,
        ?bool $visible = null,
        ?string $variant = null,
        ?bool $autoHide = true,
        ?int $autoHideDelay = null,
        ?bool $noCloseButton = null,
        ?bool $noFade = null,
        ?bool $noHoverPause = null,
        ?bool $solid = null,
        $headerClass = null,
        $bodyClass = null,
        ?bool $static = null,
        ?string $href = null
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->header = $header;
        $this->visible = !!$visible;
        $this->variant = $variant;
        $this->autoHide = $autoHide === null || $autoHide === true;
        $this->autoHideDelay = $autoHideDelay ?? 500;
        $this->noCloseButton = !!$noCloseButton;
        $this->noFade = !!$noFade;
        $this->noHoverPause = !!$noHoverPause;
        $this->solid = !!$solid;
        $this->headerClass = is_array($headerClass) ? $headerClass : explode(" ", $headerClass);
        $this->bodyClass = is_array($bodyClass) ? $bodyClass : explode(" ", $bodyClass);
        $this->static = !!$static;
        $this->href = $href;
        if ($this->id) {
            $this->attrs["id"] = $this->id;
        }
        if ($this->visible) {
            $this->attrs["class"][] = "show";
        }
        if ($this->variant) {
            $this->attrs["class"][] = "bg-$this->variant";
        }
        $this->attrs["data-autohide"] = $this->autoHide ? "true" : "false";
        $this->attrs["data-delay"] = $this->autoHideDelay ?? 500;
        if (!$this->noFade) {
            $this->attrs["class"][] = "fade";
        }
        if (!in_array("toast-header", $this->headerClass)) {
            $this->headerClass[] = "toast-header";
        }
        if (!in_array("toast-body", $this->bodyClass)) {
            $this->bodyClass[] = "toast-body";
        }
        $this->bodyClass = implode(" ", $this->bodyClass);
        $this->headerClass = implode(" ", $this->headerClass);
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.toast');
    }
}
