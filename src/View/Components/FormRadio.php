<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormRadio extends Component
{
    /**
     * @var mixed
     */
    public $value;
    public ?bool $checked;
    public ?bool $inline;
    public ?bool $plain;
    public ?bool $button;
    public ?string $buttonVariant;
    public ?string $ariaLabel;
    public ?string $ariaLabeledby;
    public ?string $id;
    public ?string $name;
    public bool $disabled;
    public ?bool $required;
    public ?string $form;
    public ?bool $autofocus;
    public ?string $size;
    public ?bool $state;
    /**
     * @var mixed
     */
    public $uncheckedValue;
    public ?bool $indeterminate;
    public ?bool $switch;

    public array $attrs = [
        "class" => []
    ];
    public array $inputAttrs = [
        "class" => [],
        "type" => "radio"
    ];
    public array $labelAttrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     *
     * @param null $value
     * @param bool|null $checked
     * @param bool|null $inline
     * @param bool|null $plain
     * @param bool|null $button
     * @param string|null $buttonVariant
     * @param string|null $ariaLabel
     * @param string|null $ariaLabeledby
     * @param string|null $id
     * @param string|null $name
     * @param bool|null $disabled
     * @param bool|null $required
     * @param string|null $form
     * @param bool|null $autofocus
     * @param string|null $size
     * @param bool|null $state
     * @param null $uncheckedValue
     * @param bool|null $indeterminate
     * @param bool|null $switch
     */
    public function __construct(
        $value = null,
        ?bool $checked = null,
        ?bool $inline = null,
        ?bool $plain = null,
        ?bool $button = null,
        ?string $buttonVariant = null,
        ?string $ariaLabel = null,
        ?string $ariaLabeledby = null,
        ?string $id = null,
        ?string $name = null,
        ?bool $disabled = null,
        ?bool $required = null,
        ?string $form = null,
        ?bool $autofocus = null,
        ?string $size = null,
        ?bool $state = null,
        $uncheckedValue = null,
        ?bool $indeterminate = null,
        ?bool $switch = null
    )
    {
        $this->value = $value;
        $this->checked = !!$checked;
        $this->inline = !!$inline;
        $this->plain = !!$plain;        //when true, render <x-input type="checkbox">
        $this->button = !!$button;
        $this->buttonVariant = $buttonVariant;
        $this->ariaLabel = $ariaLabel;
        $this->ariaLabeledby = $ariaLabeledby;
        $this->id = $id ?? uniqid();
        $this->name = $name;
        $this->disabled = !!$disabled;
        $this->required = !!$required;
        $this->form = $form;
        $this->autofocus = !!$autofocus;
        $this->size = $size;
        $this->state = $state;
        $this->uncheckedValue = $uncheckedValue;
        $this->indeterminate = !!$indeterminate;
        $this->switch = !!$switch;

        if ($this->value) {
            if (is_array($this->value) || is_object($this->value)) {
                $this->inputAttrs['value'] = json_encode($this->value);
            } else {
                $this->inputAttrs['value'] = $this->value;
            }
        }

        //this property is not available in bootstrap.
        //bootstrap-vue provides this class/style,
        //so to have this class's effect in action, bootstrap-vue's
        //styles needs to be added/loaded
        if ($this->button) {
            $this->attrs["class"] = [
                "btn-group-toggle",
                "d-inline-block"
            ];
            $this->inputAttrs["onchange"] = "this.parentElement.classList.toggle('active')";
            $this->inputAttrs['class'] = [];
            $this->labelAttrs["class"] = [
                "btn",
                $this->buttonVariant ? "btn-$this->buttonVariant" : "btn-secondary"
            ];
        } elseif ($this->switch) {
            $this->attrs["class"] = [
                "custom-control",
                "custom-switch"
            ];
            $this->inputAttrs['class'] = [
                "custom-control-input"
            ];
            $this->labelAttrs["class"] = [
                "custom-control-label"
            ];
        } else {
            $this->attrs["class"] = [
                "custom-control",
                "custom-radio"
            ];
            $this->inputAttrs["class"] = [
                "custom-control-input"
            ];
            $this->labelAttrs["class"] = [
                "custom-control-label"
            ];
        }
        if ($this->ariaLabel) {
            $this->inputAttrs["aria-label"] = $this->ariaLabel;
        }
        if ($this->ariaLabeledby) {
            $this->inputAttrs["aria-labeledby"] = $this->ariaLabeledby;
        }

        if ($this->id) {
            $this->inputAttrs["id"] = $this->id;
            $this->labelAttrs["for"] = $this->id;
        }
        if ($this->name) {
            $this->inputAttrs["name"] = $this->name;
        }
        if ($this->disabled) {
            $this->inputAttrs["disabled"] = "disabled";
        }
        if ($this->required) {
            $this->inputAttrs["required"] = "required";
        }

        if ($this->form) {
            $this->inputAttrs["form"] = $this->form;
        }

        //currently not sure this works. Try fixing it later
        if ($this->autofocus) {
            $this->attrs["autofocus"] = "autofocus";
        }
        if ($this->size) {
            $this->attrs["class"][] = "b-custom-control-$this->size";
        }
        if (!is_null($this->state)) {
            if ($this->state === false) {
                $this->inputAttrs["class"][] = "is-invalid";
            } elseif ($this->state === true) {
                $this->inputAttrs["class"][] = "is-valid";
            }
        }
        if (isset($this->uncheckedValue)) {
            if (is_array($this->uncheckedValue) || is_object($this->uncheckedValue)) {
                $this->inputAttrs['unchecked-value'] = json_encode($this->uncheckedValue);
            } else {
                $this->inputAttrs['unchecked-value'] = $this->uncheckedValue;
            }
        }
        //There is not attribute to set indeterminate prop of checkboxes.
        //So, we need to set it  by javascript. In that case, we can set
        //a data-prop. Using this data-prop we will set it in client side.
        if ($this->indeterminate) {
            $this->inputAttrs['indeterminate'] = true;
        }
        if ($this->inline) {
            $this->attrs["class"][] = "custom-control-inline";
        }
        if ($this->checked) {
            $this->inputAttrs["checked"] = "checked";
            if ($this->button) {
                $this->labelAttrs["class"][] = "active";
            }
        }

        $this->inputAttrs["autocomplete"] = "off";
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
        $this->inputAttrs["class"] = join(" ", $this->inputAttrs["class"]);
        $this->labelAttrs["class"] = join(" ", $this->labelAttrs["class"]);
    }

    public function attributesResolve($item)
    {
        $out = "";
        foreach ($this->$item as $key => $value) {
            $out .= trim($key) . '="' . trim($value) . '" ';
        }
        return trim($out);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.form-radio');
    }
}
