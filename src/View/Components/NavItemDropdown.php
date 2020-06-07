<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class NavItemDropdown extends Component
{
    public string $id;
    public bool $disabled;
    public bool $dropup;
    public bool $dropright;
    public bool $dropleft;
    public bool $right;
    public int $offset;
    public bool $noFlip;
    public ?string $text;
    public ?string $html;
    public $menuClass;
    public $toggleClass;
    public bool $noCaret;
    public string $role;

    public array $attrs = [
        "class" => [
            "nav-item",
            "dropdown",
            "b-nav-dropdown"
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
     * @param string|null $text
     * @param string|null $html
     * @param null $menuClass
     * @param null $toggleClass
     * @param bool|null $noCaret
     * @param string|null $role
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
        ?string $text = null,
        ?string $html = null,
        $menuClass = null,
        $toggleClass = null,
        ?bool $noCaret = null,
        ?string $role = null
    )
    {
        $this->id = $id ?? uniqid();
        $this->disabled = !!$disabled;
        $this->dropup = !!$dropup;
        $this->dropright = !!$dropright;
        $this->dropleft = !!$dropleft;
        $this->right = !!$right;
        $this->offset = (int)($offset ?? 0);
        $this->noFlip = !!$noFlip;
        $this->text = $text;
        $this->html = $html;
        if (is_null($menuClass) || $menuClass === "") {
            $this->menuClass = [];
        } else {
            $this->menuClass = is_array($menuClass) ? $menuClass : explode(" ", $menuClass);
        }
        if (is_null($toggleClass) || $toggleClass === "") {
            $this->toggleClass = [];
        } else {
            $this->toggleClass = is_array($toggleClass) ? $toggleClass : explode(" ", $toggleClass);
        }
        $this->noCaret = !!$noCaret;
        $this->role = $role ?? "menu";
        $this->toggleClass[] = "nav-link";
        $this->toggleClass[] = "dropdown-toggle";


        $this->attrs["id"] = $this->id;
        $this->menuClass[] = "dropdown-menu";
        if ($this->dropup) {
            $this->attrs["class"][] = "dropup";
        }
        if ($this->dropright) {
            $this->attrs["class"][] = "dropright";
        }
        if ($this->dropleft) {
            $this->attrs["class"][] = "dropleft";
        }
        if ($this->right) {
            $this->menuClass[] = "dropdown-menu-right";
        }
        if ($this->noCaret) {
            $this->toggleClass[] = "dropdown-toggle-no-caret";
        }

        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
        $this->toggleClass = implode(" ", $this->toggleClass);
        $this->menuClass = implode(" ", $this->menuClass);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.nav-item-dropdown');
    }
}
