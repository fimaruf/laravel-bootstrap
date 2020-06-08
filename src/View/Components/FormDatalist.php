<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormDatalist extends Component
{
    public array $options;
    public string $valueField;
    public string $textField;
    public string $disabledField;
    public string $id;

    public array $attrs = [
        "class" => []
    ];

    /**
     * Create a new component instance.
     * @param string $id
     * @param array|null $options
     * @param string|null $valueField
     * @param string|null $textField
     * @param string|null $disabledField
     */
    public function __construct(
        string $id,
        ?array $options = null,
        ?string $valueField = "value",
        ?string $textField = "text",
        ?string $disabledField = "disabled"
    )
    {
        $this->id = $id;
        $this->options = $options ?? [];
        $this->valueField = $valueField ?? "value";
        $this->textField = $textField ?? "text";
        $this->disabledField = $disabledField ?? "disabled";
        if ($this->id) {
            $this->attrs["id"] = $this->id;
        }
        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
    }

    public function getItemValue($item, string $key)
    {
        if (!is_array($item)) {
            return $item;
        }
        if (!isset($item[$key])) {
            return null;
        }
        return $item[$key];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<datalist {{$attributes->merge($attrs)}}>
@foreach($options as $option)
<option value="{{$getItemValue($option,$valueField)}}">{!! $getItemValue($option,$textField) !!}</option>
@endforeach
    {{$slot}}
</datalist>
blade;
    }
}
