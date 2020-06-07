<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    public ?array $options;
    public ?string $valueField;
    public ?string $textField;
    public ?bool $custom;
    public array $attrs;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param array|null $options
     * @param string|null $valueField
     * @param string|null $textField
     * @param bool|null $custom
     * @param mixed $value
     */
    public function __construct(?array $options = null, ?string $valueField = null, ?string $textField = null, ?bool $custom = false, $value = null)
    {
        $this->options = $options ?? [];
        $this->valueField = $valueField ?? 'value';
        $this->textField = $textField ?? 'text';
        $this->custom = !!$custom;
        $this->value = $value;
        $this->attrs = [
            "class" => [
                $this->custom ? "custom-select" : "form-control"
            ]
        ];
        $this->attrs['class'] = join(" ", $this->attrs['class']);
    }

    public function getItem($item, $type)
    {
        if (!is_array($item)) {
            return $item;
        }
        return $item[$type === 'text' ? $this->textField : $this->valueField];
    }

    public function selectedAttr($item)
    {
        if (!$item) return "";
        return ($item[$this->valueField] === $this->value) ? 'selected="selected"' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.form-select');
    }
}
