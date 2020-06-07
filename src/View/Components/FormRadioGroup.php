<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

/**
 * Class FormRadioGroup
 * @package App\View\Components
 * @link https://bootstrap-vue.org/docs/components/form-radio#comp-ref-b-form-radio-group-props
 */
class FormRadioGroup extends Component
{
    public string $id;              //              Used to set the 'id' attribute on the rendered content, and used as the base to generate any additional element IDs as needed
    public string $name;            //              Sets the value of the 'name' attribute on the form control
    public bool $disabled;          //	            When set to 'true', disables the component's functionality and places it in a disabled state
    public bool $required;          //false 	    Adds the 'required' attribute to the form control
    public ?string $form;           //              ID of the form that the form control belongs to. Sets the 'form' attribute on the control
    public bool $autofocus;         //false 	    When set to 'true', attempts to auto-focus the control when it is mounted, or re-activated when in a keep-alive. Does not set the 'autofocus' attribute on the control
    public bool $validated;         //false	        When set, adds the Bootstrap class 'was-validated' to the group wrapper
    public ?string $ariaInvalid;    //false	        Sets the 'aria-invalid' attribute value on the wrapper element. When not provided, the 'state' prop will control the attribute
    public bool $stacked;           //false	        When set, renders the radio group in stacked mode
    public bool $plain;             //false	        Render the form control in plain mode, rather than custom styled mode
    public bool $buttons;           //false	        When set, renders the radios in this group with button styling
    public bool $switch;
    public string $buttonVariant;   //'secondary'	Specifies the Bootstrap contextual color theme variant the apply to the button style radios
    public array $options;          //[]	        Array of items to render in the component
    public string $valueField;      //'value'	    Field name in the 'options' array that should be used for the value
    public string $textField;       //'text'	    Field name in the 'options' array that should be used for the text label
    public string $htmlField;       //'html'	    Field name in the 'options' array that should be used for the html label instead of text field. Use with caution.
    public string $disabledField;   //'disabled'	Field name in the 'options' array that should be used for the disabled state
    public ?string $size;           //              Set the size of the component's appearance. 'sm', 'md' (default), or 'lg'
    public ?bool $state;            //null	        Controls the validation state appearance of the component. 'true' for valid, 'false' for invalid', or 'null' for no validation state
    public $checked;                //null	        The current value of the checked radio in the group

    public array $attrs = [
        "role" => "radiogroup",
        "class" => [
            "bv-no-focus-ring"      //imported from bootstrap-vue
        ]
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
     * @param bool|null $validated
     * @param string|null $ariaInvalid
     * @param bool|null $stacked
     * @param bool|null $plain
     * @param bool|null $buttons
     * @param bool|null $switch
     * @param string|null $buttonVariant
     * @param array $options
     * @param string|null $valueField
     * @param string|null $textField
     * @param string|null $htmlField
     * @param string|null $disabledField
     * @param string|null $size
     * @param bool|null $state
     * @param null $checked
     */
    public function __construct(
        ?string $id = null,
        string $name = null,
        ?bool $disabled = null,
        ?bool $required = null,
        ?string $form = null,
        ?bool $autofocus = null,
        ?bool $validated = null,
        ?string $ariaInvalid = null,
        ?bool $stacked = null,
        ?bool $plain = null,
        ?bool $buttons = null,
        ?bool $switch = null,
        ?string $buttonVariant = null,
        array $options = [],
        ?string $valueField = null,
        ?string $textField = null,
        ?string $htmlField = null,
        ?string $disabledField = null,
        ?string $size = null,
        ?bool $state = null,
        $checked = null
    )
    {
        $this->id = $id ?? uniqid();
        $this->name = $name ?? uniqid();
        $this->disabled = !!$disabled;
        $this->required = !!$required;
        $this->form = $form;
        $this->autofocus = !!$autofocus;
        $this->validated = !!$validated;
        $this->ariaInvalid = $ariaInvalid;
        $this->stacked = !!$stacked;
        $this->plain = !!$plain;
        $this->buttons = !!$buttons;
        $this->switch = !!$switch;
        $this->buttonVariant = $buttonVariant ?? "secondary";
        $this->options = $options;
        $this->valueField = $valueField ?? "value";
        $this->textField = $textField ?? "text";
        $this->htmlField = $htmlField ?? "html";
        $this->disabledField = $disabledField ?? "disabled";
        $this->size = $size;
        $this->state = $state;      //it can be null,false, true, so don't pass it through bang bang
        $this->checked = $checked;  //value for the group.
        if ($this->id) {
            $this->attrs["id"] = $id;
        }
        $this->attrs["class"] = join(" ", $this->attrs["class"]);
    }

    public function getItemValue($item, string $key)
    {
        $item = Arr::dot($item);
        return isset($item[$key]) ? $item[$key] : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.form-radio-group');
    }
}
