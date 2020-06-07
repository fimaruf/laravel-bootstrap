<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public ?string $id;
    public bool $disabled;
    public bool $dropup;
    public bool $dropright;
    public bool $dropleft;
    public bool $right;
    public int $offset;
    public bool $noFlip;
    public $popperOpts;
    public string $boundary;
    public ?string $text;
    public ?string $html;
    public ?string $buttonContent;
    public string $variant;
    public ?string $size;
    public bool $block;
    public $menuClass;
    public string $toggleTag;
    public string $toggleText;
    public bool $noCaret;
    public bool $split;
    public ?string $splitHref;
    public ?string $splitVariant;
    public $splitClass;
    public string $splitButtonType;
    public string $role;
    public bool $buttonGroup;

    public array $attrs = [
        "class" => [
            "dropdown"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param bool|null $disabled
     * @param bool|null $dropup
     * @param bool|null $dropright
     * @param bool|null $dropleft
     * @param bool|null $right
     * @param int|null $offset
     * @param bool|null $noFlip
     * @param null $popperOpts
     * @param string|null $boundary
     * @param string|null $text
     * @param string|null $html
     * @param string|null $buttonContent
     * @param string|null $variant
     * @param string|null $size
     * @param bool|null $block
     * @param null $menuClass
     * @param string|null $toggleTag
     * @param string|null $toggleText
     * @param bool|null $noCaret
     * @param bool|null $split
     * @param string|null $splitHref
     * @param string|null $splitVariant
     * @param null $splitClass
     * @param string|null $splitButtonType
     * @param string|null $role
     * @param bool|null $buttonGroup
     */
    public function __construct(
        ?string $id = null,
        ?bool $disabled = null,
        ?bool $dropup = null,
        ?bool $dropright = null,
        ?bool $dropleft = null,
        ?bool $right = null,
        ?int $offset = null,
        ?bool $noFlip = null,
        $popperOpts = null,
        ?string $boundary = null,
        ?string $text = null,
        ?string $html = null,
        ?string $buttonContent = null,
        string $variant = null,
        ?string $size = null,
        ?bool $block = null,
        $menuClass = null,
        ?string $toggleTag = null,
        ?string $toggleText = null,
        ?bool $noCaret = null,
        ?bool $split = null,
        ?string $splitHref = null,
        ?string $splitVariant = null,
        $splitClass = null,
        ?string $splitButtonType = null,
        ?string $role = null,
        ?bool $buttonGroup = null
    )
    {
        $this->id = $id;
        $this->disabled = !!$disabled;
        $this->dropup = !!$dropup;
        $this->dropright = !!$dropright;
        $this->dropleft = !!$dropleft;
        $this->right = !!$right;
        $this->offset = $offset ?? 0;
        $this->noFlip = !!$noFlip;
        $this->popperOpts = $popperOpts;
        $this->boundary = $boundary ?? "scrollParent";
        $this->text = $text;
        $this->html = $html;
        $this->buttonContent = $buttonContent;
        $this->variant = $variant ?? "secondary";
        $this->size = $size;
        $this->block = !!$block;
        $this->menuClass = is_array($menuClass) ? $menuClass : explode(" ", $menuClass);
        $this->toggleTag = $toggleTag ?? "button";
        $this->toggleText = $toggleText ?? "Toggle Dropdown";
        $this->noCaret = !!$noCaret;
        $this->split = !!$split;
        $this->splitHref = $splitHref;
        $this->splitVariant = $splitVariant;
        $this->splitClass = is_array($splitClass) ? $splitClass : explode(" ", $splitClass);
        $this->splitButtonType = $splitButtonType ?? "button";
        $this->role = $role ?? "menu";
        $this->buttonGroup = $buttonGroup === null || $buttonGroup === true;

        if ($this->buttonGroup) {
            $this->attrs["class"][] = "btn-group";
        }
        //https://bootstrap-vue.org/docs/components/dropdown#drop-right-or-left
        if ($this->dropup) {
            $this->attrs["class"][] = "dropup";
        } elseif ($this->dropright) {
            $this->attrs["class"][] = "dropright";
        } elseif ($this->dropleft) {
            $this->attrs["class"][] = "dropleft";
        }


        if (!in_array("dropdown-menu", $this->menuClass)) {
            $this->menuClass[] = "dropdown-menu";
        }
        if ($this->right && !in_array("dropdown-menu-right", $this->menuClass)) {
            $this->menuClass[] = "dropdown-menu-right";
        }
        if ($this->block){
            $this->attrs["class"][]="d-flex";
        }
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
        $this->menuClass = implode(" ", $this->menuClass);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.dropdown');
    }
}
