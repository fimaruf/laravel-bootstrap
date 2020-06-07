<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

/**
 * Class FormTextarea
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/form-textarea#comp-ref-b-form-textarea-props
 */
class FormTextarea extends Component
{
    public ?string $id;
    public ?string $name;
    public ?bool $disabled;
    public ?bool $required;
    public ?string $form;
    public ?bool $autofocus;
    public ?string $size;
    public ?bool $state;
    public ?string $value;
    public ?string $ariaInvalid;
    public ?bool $readonly;
    public ?bool $plaintext;
    public ?string $autocomplete;
    public ?int $rows;
    public ?int $maxRows;
    public ?string $wrap;
    public ?bool $noAutoShrink;

    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string|null $name
     * @param bool|null $disabled
     * @param bool|null $required
     * @param string|null $form
     * @param bool|null $autofocus
     * @param string|null $size
     * @param bool|null $state
     * @param string|null $value
     * @param string|null $ariaInvalid
     * @param bool|null $readonly
     * @param bool|null $plaintext
     * @param string|null $autocomplete
     * @param int|null $rows
     * @param int|null $maxRows
     * @param string|null $wrap
     * @param bool|null $noAutoShrink
     */
    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?bool $disabled = null,
        ?bool $required = null,
        ?string $form = null,
        ?bool $autofocus = null,
        ?string $size = null,
        ?bool $state = null,
        ?string $value = null,
        ?string $ariaInvalid = null,
        ?bool $readonly = null,
        ?bool $plaintext = null,
        ?string $autocomplete = null,
        ?int $rows = null,
        ?int $maxRows = null,
        ?string $wrap = null,
        ?bool $noAutoShrink = null
    )
    {
        $this->id = $id ?? uniqid();
        $this->name = $name;
        $this->disabled = !!$disabled;
        $this->required = !!$required;
        $this->form = $form;
        $this->autofocus = !!$autofocus;
        $this->size = $size;
        $this->state = $state;
        $this->value = $value ?? null;
        $this->ariaInvalid = $ariaInvalid;
        $this->readonly = !!$readonly || !!$plaintext;      //when plaintext it should be readyonly according to bootstrap-vue
        $this->plaintext = !!$plaintext;
        $this->autocomplete = $autocomplete;
        $this->rows = (int)($rows ?? 2);
        $this->maxRows = (int)($maxRows ?? 0);
        $this->wrap = $wrap ?? "soft";
        $this->noAutoShrink = !!$noAutoShrink;


        $this->attrs["id"] = $this->id;
        $this->attrs["wrap"] = $this->wrap;
        if ($this->name) {
            $this->attrs["name"] = $name;
        }
        $this->attrs["disabled"] = $this->disabled;
        $this->attrs["required"] = $this->required;
        if ($this->required) {
            $this->attrs["aria-required"] = "true";
        }
        if ($this->form) {
            $this->attrs["form"] = $this->form;
        }
        $this->attrs["autofocus"] = $this->autofocus;
        if ($this->size) {
            $this->attrs["class"][] = "form-control-$this->size";
        }

        if ($this->state === true) {
            $this->attrs["class"][] = "is-valid";
        } elseif ($this->state === false) {
            $this->attrs["class"][] = "is-invalid";
        }
        $this->attrs["value"] = $this->value;
        $this->attrs["aria-invalid"] = $this->ariaInvalid === true ? "true" : $this->ariaInvalid;
        $this->attrs["readonly"] = $this->readonly;
        $this->attrs["class"][] = $this->plaintext ? "form-control-plaintext" : "form-control";
        if ($this->autocomplete) {
            $this->attrs["autocomplete"] = $this->autocomplete;
        }

        $this->attrs["rows"] = $this->rows;
        if ($this->maxRows) {
            $this->attrs["max-rows"] = $this->maxRows;
            if ($this->rows >= 2) {
                //bootstrap-vue's calculation for max-rows height. need improvements
                $height = ($this->maxRows - 2) * 26 + 62;
                $this->attrs['style'] = "overflow-y: scroll; max-height: {$height}px;";
            }
        }
        $this->attrs["wrap"] = $this->wrap;

        $this->attrs["class"] = join(" ", $this->attrs["class"]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.form-textarea');
    }
}
