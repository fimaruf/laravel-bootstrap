<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public ?bool $state;
    public ?string $label;
    public ?string $labelFor;
    public ?string $labelSize;
    public bool $labelSrOnly;
    public ?int $labelCols;
    public ?int $labelColsSm;
    public ?int $labelColsMd;
    public ?int $labelColsLg;
    public ?int $labelColsXl;

    public ?string $labelAlign;
    public ?string $labelAlignSm;
    public ?string $labelAlignMd;
    public ?string $labelAlignLg;
    public ?string $labelAlignXl;

    /**
     * @var array|string|null
     */
    public $labelClass;
    public ?string $description;
    public ?string $invalidFeedback;
    public ?string $validFeedback;
    public bool $tooltip;
    public ?string $feedbackAriaLive;
    public bool $validated;
    public bool $disabled;
    public bool $hasCols;
    public array $attrs;
    public string $ariaDescribedBy;

    /**
     * Create a new component instance.
     *
     * @param bool|null $state
     * @param string|null $label
     * @param string|null $labelFor
     * @param string|null $labelSize
     * @param bool $labelSrOnly
     * @param int|null $labelCols
     * @param int|null $labelColsSm
     * @param int|null $labelColsMd
     * @param int|null $labelColsLg
     * @param int|null $labelColsXl
     * @param string|null $labelAlign
     * @param string|null $labelAlignSm
     * @param string|null $labelAlignMd
     * @param string|null $labelAlignLg
     * @param string|null $labelAlignXl
     * @param null $labelClass
     * @param string|null $description
     * @param string|null $invalidFeedback
     * @param string|null $validFeedback
     * @param bool $tooltip
     * @param string $feedbackAriaLive
     * @param bool $validated
     * @param bool $disabled
     */
    public function __construct(
        ?bool $state = null,
        ?string $label = null,
        ?string $labelFor = null,
        ?string $labelSize = null,
        bool $labelSrOnly = false,

        ?int $labelCols = 0,
        ?int $labelColsSm = 0,
        ?int $labelColsMd = 0,
        ?int $labelColsLg = 0,
        ?int $labelColsXl = 0,

        ?string $labelAlign = null,
        ?string $labelAlignSm = null,
        ?string $labelAlignMd = null,
        ?string $labelAlignLg = null,
        ?string $labelAlignXl = null,

        $labelClass = null,
        ?string $description = null,
        ?string $invalidFeedback = null,
        ?string $validFeedback = null,
        bool $tooltip = false,
        string $feedbackAriaLive = "assertive",
        bool $validated = false,
        bool $disabled = false
    )
    {
        $this->state = $state ?? null;
        $this->label = $label;
        $this->labelFor = $labelFor;
        $this->labelSize = $labelSize;
        $this->labelSrOnly = !!$labelSrOnly;

        $this->labelCols = $labelCols ?? 0;
        $this->labelColsSm = $labelColsSm ?? 0;
        $this->labelColsMd = $labelColsMd ?? 0;
        $this->labelColsLg = $labelColsLg ?? 0;
        $this->labelColsXl = $labelColsXl ?? 0;

        $this->labelAlign = $labelAlign;
        $this->labelAlignSm = $labelAlignSm;
        $this->labelAlignMd = $labelAlignMd;
        $this->labelAlignLg = $labelAlignLg;
        $this->labelAlignXl = $labelAlignXl;

        $this->labelClass = $labelClass;
        $this->description = $description;
        $this->invalidFeedback = $invalidFeedback;
        $this->validFeedback = $validFeedback;
        $this->tooltip = !!$tooltip;
        $this->feedbackAriaLive = $feedbackAriaLive ?? "assertive";
        $this->validated = !!$validated;
        $this->disabled = !!$disabled;
        $this->hasCols = !!$this->labelCols || !!$this->labelColsSm || !!$this->labelColsMd || !!$this->labelColsLg || !!$this->labelColsXl;
        $this->attrs = [
            "class" => ["form-group"]
        ];
        if ($this->hasCols) {
            $this->attrs["class"][] = "form-row";
        }
        $this->ariaDescribedBy = uniqid();
        if ($this->description) {
            $this->attrs['aria-describedby'] = $this->ariaDescribedBy;
        }
        if (is_array($this->labelClass)) {
            $this->labelClass = join(" ", $this->labelClass);
        }
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view("laravel-bootstrap::components.form-group");
    }
}
