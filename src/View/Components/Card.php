<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class Card
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/card#comp-ref-b-card-props
 */
class Card extends Component
{
    //body props
    public ?string $bodyTag;            //div       Specify the HTML tag to render instead of the default tag for the body
    public ?string $bodyBgVariant;      //          Applies one of the Bootstrap theme color variants to the body background
    public ?string $bodyBorderVariant;  //          Applies one of the Bootstrap theme color variants to the body border
    public ?string $bodyTextVariant;    //          Applies one of the Bootstrap theme color variants to the body text
    /**
     * @var array|object|string|null
     */
    public $bodyClass;          //String or Object or Array     CSS class (or classes) to apply to the body

    //title props
    public ?string $title;              //          Text content to place in the title
    public ?string $titleTag;           //h4	    Specify the HTML tag to render instead of the default tag for the title
    public ?string $titleClass;

    public ?string $subTitle;           //          Text content to place in the sub title
    public ?string $subTitleTag;        //h6        Specify the HTML tag to render instead of the default tag for the sub title
    public ?string $subTitleTextVariant;//muted     Applies one of the Bootstrap theme color variants to the sub title text
    public $subTitleClass;
    public bool $overlay;               //false     When set, will overlay the card body on top of the image (if the card has an image)

    //header props
    public ?string $headerTag;          //div       Specify the HTML tag to render instead of the default tag for the header
    public ?string $headerBgVariant;    //          Applies one of the Bootstrap theme color variants to the header background
    public ?string $headerBorderVariant;//          Applies one of the Bootstrap theme color variants to the header border
    public ?string $headerTextVariant;  //          Applies one of the Bootstrap theme color variants to the header text
    public ?string $header;             //          Text content to place in the header
    /**
     * @var array|object|string|null
     */
    public $headerClass;        //string|array|object          CSS class (or classes) to apply to the header

    //footer props
    public ?string $footerTag;          //div       Specify the HTML tag to render instead of the default tag for the footer
    public ?string $footerBgVariant;    //          Applies one of the Bootstrap theme color variants to the footer background
    public ?string $footerBorderVariant;//          Applies one of the Bootstrap theme color variants to the footer border
    public ?string $footerTextVariant;  //          Applies one of the Bootstrap theme color variants to the footer text
    public ?string $footer;             //          Text content to place in the footer
    /**
     * @var array|object|string|null
     */
    public ?string $footerClass;        //string|array|object   CSS class (or classes) to apply to the footer

    //Image Props
    public ?string $imgSrc;             //          URL for the optional image
    public ?string $imgAlt;             //          Value to set the image attribute 'alt'
    public bool $imgTop;                //false     Set if the image should appear at the top of the card
    public bool $imgBottom;             //false     Set if the image should appear at the bottom of the card
    public bool $imgStart;              //false     Set if the image should appear at the start (left) of the card
    public bool $imgLeft;               //false     Set if the image should appear at the start (left) of the card. Synonym for the 'left' prop
    public bool $imgEnd;                //false     Set if the image should appear at the end (right) of the card
    public bool $imgRight;              //false     Set if the image should appear at the end (right) of the card. Synonym for the 'right' prop
    public ?string $imgHeight;          //Number|String          The value to set on the image's 'height' attribute
    public ?string $imgWidth;           //Number|String           The value to set on the image's 'width' attribute


    //card props
    public ?string $tag;                //div       Specify the HTML tag to render instead of the default tag
    public ?string $bgVariant;          //          Applies one of the Bootstrap theme color variants to the background
    public ?string $borderVariant;      //          Applies one of the Bootstrap theme color variants to the border
    public ?string $textVariant;        //          Applies one of the Bootstrap theme color variants to the text
    public ?string $align;              //          Text alignment for the card's content: 'left', 'center' or 'right'
    public ?bool $noBody;               //false     Disable rendering of the default inner card-body element

    public array $classList;

    /**
     * Create a new component instance.
     * @param string|null $bodyTag
     * @param string|null $bodyBgVariant
     * @param string|null $bodyBorderVariant
     * @param string|null $bodyTextVariant
     * @param string|null $bodyClass
     * @param string|null $title
     * @param string|null $titleTag
     * @param null $titleClass
     * @param string|null $subTitle
     * @param string|null $subTitleTag
     * @param string|null $subTitleTextVariant
     * @param array|object|string|null $subTitleClass
     * @param bool $overlay
     * @param string|null $headerTag
     * @param string|null $headerBgVariant
     * @param string|null $headerBorderVariant
     * @param string|null $headerTextVariant
     * @param string|null $header
     * @param null $headerClass
     * @param string|null $footerTag
     * @param string|null $footerBgVariant
     * @param string|null $footerBorderVariant
     * @param string|null $footerTextVariant
     * @param string|null $footer
     * @param null $footerClass
     * @param string|null $imgSrc
     * @param string|null $imgAlt
     * @param bool $imgTop
     * @param bool $imgBottom
     * @param bool $imgStart
     * @param bool $imgLeft
     * @param bool $imgEnd
     * @param bool $imgRight
     * @param string|null $imgHeight
     * @param string|null $imgWidth
     * @param string|null $tag
     * @param string|null $bgVariant
     * @param string|null $borderVariant
     * @param string|null $textVariant
     * @param string|null $align
     * @param bool|null $noBody
     */
    public function __construct(
        ?string $bodyTag = 'div',
        ?string $bodyBgVariant = null,
        ?string $bodyBorderVariant = null,
        ?string $bodyTextVariant = null,
        ?string $bodyClass = null,

        ?string $title = null,
        ?string $titleTag = null,
        $titleClass = null,

        ?string $subTitle = null,
        ?string $subTitleTag = "h6",
        ?string $subTitleTextVariant = "muted",
        $subTitleClass = null,

        bool $overlay = false,

        ?string $headerTag = "div",
        ?string $headerBgVariant = null,
        ?string $headerBorderVariant = null,
        ?string $headerTextVariant = null,
        ?string $header = null,
        $headerClass = null,


        ?string $footerTag = "div",
        ?string $footerBgVariant = null,
        ?string $footerBorderVariant = null,
        ?string $footerTextVariant = null,
        ?string $footer = null,
        $footerClass = null,


        ?string $imgSrc = null,
        ?string $imgAlt = null,
        bool $imgTop = false,
        bool $imgBottom = false,
        bool $imgStart = false,
        bool $imgLeft = false,
        bool $imgEnd = false,
        bool $imgRight = false,
        ?string $imgHeight = null,
        ?string $imgWidth = null,

        ?string $tag = "div",
        ?string $bgVariant = null,
        ?string $borderVariant = null,
        ?string $textVariant = null,

        ?string $align = null,
        ?bool $noBody = false
    )
    {
        //processed by card-body
        $this->bodyTag = $bodyTag;
        $this->bodyBgVariant = $bodyBgVariant;
        $this->bodyBorderVariant = $bodyBorderVariant;
        $this->bodyTextVariant = $bodyTextVariant;
        $this->bodyClass = is_array($bodyClass) ? $bodyClass : explode(" ", $bodyClass);

        //processed by card-title
        $this->title = $title;
        $this->titleTag = $titleTag;
        $this->titleClass = $titleClass;

        $this->subTitle = $subTitle;
        $this->subTitleTag = $subTitleTag;
        $this->subTitleTextVariant = $subTitleTextVariant;
        $this->subTitleClass = $subTitleClass;

        $this->overlay = !!$overlay;

        //processed  by card-header
        $this->headerTag = $headerTag;
        $this->headerBgVariant = $headerBgVariant;
        $this->headerBorderVariant = $headerBorderVariant;
        $this->headerTextVariant = $headerTextVariant;
        $this->header = $header;
        $this->headerClass = $headerClass;

        $this->footerTag = $footerTag;
        $this->footerBgVariant = $footerBgVariant;
        $this->footerBorderVariant = $footerBorderVariant;
        $this->footerTextVariant = $footerTextVariant;
        $this->footer = $footer;
        $this->footerClass = $footerClass;  //let this be processed by card-footer

        //image props, no need pre-processing, it will be done by card-img
        $this->imgSrc = $imgSrc;
        $this->imgAlt = $imgAlt;
        $this->imgTop = $imgTop;
        $this->imgBottom = $imgBottom;
        $this->imgStart = $imgStart;
        $this->imgLeft = $imgLeft;
        $this->imgEnd = $imgEnd;
        $this->imgRight = $imgRight;
        $this->imgHeight = $imgHeight;
        $this->imgWidth = $imgWidth;

        //these props are handled by Card itself, so we prefixed with required values
        $this->tag = $tag ?? "div";
        $this->bgVariant = $bgVariant ? "bg-$bgVariant" : null;
        $this->borderVariant = $borderVariant ? "border-$borderVariant" : null;
        $this->textVariant = $textVariant ? "text-$textVariant" : null;


        $this->align = $align ?? null;
        $this->noBody = !!$noBody;

        $this->classList = [
            "card"
        ];
        if ($this->bgVariant) {
            $this->classList[] = $this->bgVariant;
        }
        if ($this->textVariant) {
            $this->classList[] = $this->textVariant;
        }
        if ($this->borderVariant) {
            $this->classList[] = $this->borderVariant;
        }
        if ($this->imgLeft) {
            $this->classList[] = "flex-row";
        }
        if ($this->imgRight) {
            $this->classList[] = "flex-row-reverse";
        }
        if ($this->overlay) {
            $this->bodyClass[] = "card-img-overlay";
        }
        $this->bodyClass = implode(" ", $this->bodyClass);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.card');
    }
}
