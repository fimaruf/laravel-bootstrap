<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Tabs extends Component
{
    public string $id;
    public string $tag;
    public bool $fill;
    public bool $justified;
    public ?string $align;
    public bool $pills;
    public bool $vertical;
    public bool $small;
    public bool $card;
    public bool $end;
    public bool $noFade;
    public bool $noNavStyle;
    public bool $noKeyNav;
    public $contentClass;
    public $navClass;
    public $navWrapperClass;
    public $activeNavItemClass;
    public $activeTabClass;
    public int $active; //not boolean
    /*
     * BIG ISSUE: Because currently I didn't find any way of extracting the title of the tab items,
     * and send those title to the tabs component for making nav links, I have to add another property
     * which will manually used to set the nav link.
     * The required  fields should be :
     * tab_id, This will be the nav-link href
     * text content of the nav-link
     */

    public $navLinks;


    public array $attrs = [
        "class" => [
            "tabs"
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string|null $tag
     * @param bool|null $fill
     * @param bool|null $justified
     * @param string|null $align
     * @param bool|null $pills
     * @param bool|null $vertical
     * @param bool|null $small
     * @param bool|null $card
     * @param bool|null $end
     * @param bool|null $noFade
     * @param bool|null $noNavStyle
     * @param bool|null $noKeyNav
     * @param null $contentClass
     * @param null $navClass
     * @param null $navWrapperClass
     * @param null $activeNavItemClass
     * @param null $activeTabClass
     * @param array|string $navLinks
     * @param int|null $active
     */
    public function __construct(
        ?string $id = null,
        ?string $tag = null,
        ?bool $fill = null,
        ?bool $justified = null,
        ?string $align = null,
        ?bool $pills = null,
        ?bool $vertical = null,
        ?bool $small = null,
        ?bool $card = null,
        ?bool $end = null,
        ?bool $noFade = null,
        ?bool $noNavStyle = null,
        ?bool $noKeyNav = null,
        $contentClass = null,
        $navClass = null,
        $navWrapperClass = null,
        $activeNavItemClass = null,
        $activeTabClass = null,
        $navLinks = null,
        ?int $active = 0
    )
    {
        $this->id = $id ?? uniqid();
        $this->tag = $tag ?? "div";
        $this->fill = !!$fill;
        $this->justified = !!$justified;
        $this->align = !!$align;
        $this->pills = !!$pills;
        $this->vertical = !!$vertical;
        $this->small = !!$small;
        $this->card = !!$card;
        $this->end = !!$end;
        $this->noFade = !!$noFade;
        $this->noNavStyle = !!$noNavStyle;
        $this->noKeyNav = !!$noKeyNav;
        $this->contentClass = is_array($contentClass) ? $contentClass : explode(" ", $contentClass);
        $this->navClass = is_array($navClass) ? $navClass : explode(" ", $navClass);
        $this->navWrapperClass = is_array($navWrapperClass) ? $navWrapperClass : explode(" ", $navWrapperClass);
        $this->activeNavItemClass = $activeNavItemClass;
        $this->activeTabClass = $activeTabClass;
        $this->navLinks = $navLinks;
        //tabs
        $this->attrs["id"] = $this->id;
        $this->active = $active ?? 0;

        //content
        if (!in_array("tab-content", $this->contentClass)) {
            $this->contentClass[] = "tab-content";
        }
        //nav classes

        //nav wrapper
        if ($this->card) {
            $this->navWrapperClass[] = "card-header";
        }

        if ($this->vertical) {
            $this->attrs["class"][] = "row";
            $this->navWrapperClass[] = "col-auto";
            $this->contentClass[] = "col";
        }

        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
        $this->contentClass = implode(" ", $this->contentClass);
        $this->navClass = implode(" ", $this->navClass);
        $this->navWrapperClass = implode(" ", $this->navWrapperClass);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.tabs');
    }
}
