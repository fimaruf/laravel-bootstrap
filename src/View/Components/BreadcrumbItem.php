<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;
use function GuzzleHttp\Psr7\stream_for;

/**
 * Class BreadcrumbItem
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/breadcrumb#comp-ref-b-breadcrumb-item-props
 */
class BreadcrumbItem extends Component
{
    public ?string $tag;
    public ?string $text;
    public ?string $ariaContent;
    public ?string $href;
    public ?string $rel;
    public ?string $target;
    public bool $active;
    public bool $disabled;
    public ?string $activeClass;
    public bool $exact;
    public ?string $exactActiveClass;
    public array $classList;
    public ?string $icon;

    /**
     * Create a new component instance.
     *
     * @param string|null $tag
     * @param string|null $text
     * @param string|null $ariaContent
     * @param string|null $href
     * @param string|null $rel
     * @param string|null $target
     * @param bool $active
     * @param bool $disabled
     * @param string $activeClass
     * @param bool $exact
     * @param string|null $exactActiveClass
     * @param string|null $icon
     */
    public function __construct(
        ?string $tag = "li",
        ?string $text = null,
        ?string $ariaContent = "location",
        ?string $href = null,
        ?string $rel = null,
        ?string $target = null,
        bool $active = false,
        bool $disabled = false,
        ?string $activeClass = "active",
        bool $exact = false,
        ?string $exactActiveClass = null,
        ?string $icon = null
    )
    {
        $this->tag = $tag ?? "li";
        $this->text = $text;
        $this->ariaContent = $ariaContent ?? "location";
        $this->href = $href;
        $this->rel = $rel;
        $this->target = $target;
        $this->active = !!$active;
        $this->disabled = !!$disabled;
        $this->activeClass = $activeClass ?? 'active';
        $this->exact = !!$exact;
        $this->exactActiveClass = $exactActiveClass;
        $this->icon = $icon;

        $this->classList = ["breadcrumb-item"];
        if ($this->active) {
            $this->classList[] = $this->activeClass;
        }
        if ($disabled) {
            $this->classList[] = "disabled";
        }
        if (request()->url() === $this->href) {
            $this->classList[] = $this->exactActiveClass;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.breadcrumb-item');
    }
}
