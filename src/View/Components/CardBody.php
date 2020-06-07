<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class CardBody
 * @param string|null $tag
 * @param string|null $bgVariant
 * @param string|null $borderVariant
 * @param string|null $textVariant
 * @param string|null $title
 * @param string|null $titleTag
 * @param string|object|array|null $titleClass
 * @package App\View\Components
 */
class CardBody extends Component
{
    public ?string $tag;
    public ?string $bgVariant;
    public ?string $borderVariant;
    public ?string $textVariant;
    public ?string $title;
    public ?string $titleTag;
    public $titleClass;

    public ?string $subTitle;           //          Text content to place in the sub title
    public ?string $subTitleTag;        //h6        Specify the HTML tag to render instead of the default tag for the sub title
    public ?string $subTitleTextVariant;//muted     Applies one of the Bootstrap theme color variants to the sub title text
    public $subTitleClass;

    public array $classList;        //merges with class

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param string|null $bgVariant
     * @param string|null $borderVariant
     * @param string|null $textVariant
     * @param string|null $title
     * @param string|null $titleTag
     * @param string|object|array|null $titleClass
     * @param string|null $subTitle
     * @param string|null $subTitleTag
     * @param string|null $subTitleTextVariant
     * @param array|string|object|null $subTitleClass
     */
    public function __construct(
        ?string $tag = null,
        ?string $bgVariant = null,
        ?string $borderVariant = null,
        ?string $textVariant = null,
        ?string $title = null,
        ?string $titleTag = null,
        $titleClass = null,
        ?string $subTitle = null,
        ?string $subTitleTag = "h6",
        ?string $subTitleTextVariant = "muted",
        $subTitleClass = null
    )
    {
        $this->tag = $tag ?? "div";
        $this->bgVariant = $bgVariant ? "bg-$bgVariant" : null;
        $this->textVariant = $textVariant ? "text-$textVariant" : null;
        $this->borderVariant = $borderVariant ? "border-$borderVariant" : null;

        $this->classList = ["card-body"];

        if ($this->bgVariant) {
            $this->classList[] = $this->bgVariant;
        }
        if ($this->borderVariant) {
            $this->classList[] = $this->borderVariant;
        }
        if ($this->textVariant) {
            $this->classList[] = $this->textVariant;
        }

        //title props, processed by card-title
        $this->title = $title;
        $this->titleTag = $titleTag;
        $this->titleClass = $titleClass;

        $this->subTitle = $subTitle;
        $this->subTitleTag = $subTitleTag;
        $this->subTitleTextVariant = $subTitleTextVariant;
        $this->subTitleClass = $subTitleClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
                <{{$tag}} {{$attributes->merge(["class"=>join(" ",$classList)])}}>
                @if($title)<x-card-title :tag="$titleTag" :class="$titleClass">{{$title}}</x-card-title>@endif
                @if($subTitle)<x-card-sub-title :text-variant="$subTitleTextVariant" :tag="$subTitleTag" :class="$titleClass">{{$subTitle}}</x-card-sub-title>@endif
                {{$slot}}
                </{{$tag}}>
                blade;

//        return view('components.card-body');
    }
}
