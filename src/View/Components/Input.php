<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * @var string|null lg | sm
     */
    public ?string $size;

    public ?string $type;
    public bool $plainText;
    public bool $isValid;   //false
    public bool $isInvalid; //false


    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @param bool $plainText
     * @param string $size
     * @param string|null $type
     * @param bool $isInvalid
     * @param bool $isValid
     */
    public function __construct(
        bool $plainText = false,
        string $size = null,
        string $type = null,
        bool $isInvalid = false,
        bool $isValid = false
    )
    {
        $this->plainText = !!$plainText;
        $this->size = $size;
        $this->type = $type;
        $this->isInvalid = !!$isInvalid;
        $this->isValid = !!$isValid;


        $this->attrs = [
            'class' => [],
            'type' => $this->type ?? 'text'
        ];
        if ($this->size) {
            $this->attrs['class'][] = "form-control-$this->size";
        }
        if ($this->plainText) {
            $this->attrs['readonly'] = true;
            $this->attrs['class'][] = "form-control-plaintext";
        }

        if ($this->type === 'range') {
            $this->attrs['class'][] = "form-control-range";
        } elseif (!$this->plainText) {
            $this->attrs['class'][] = "form-control";
        }

        if ($this->isInvalid) {
            $this->attrs['class'][] = "is-invalid";
            $this->attrs['aria-invalid'] = "true";
        }
        if ($this->isValid){
            $this->attrs['class'][]="is-valid";
        }

        $this->attrs['class'] = join(" ", $this->attrs['class']);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<input {{$attributes->merge($attrs)}} />
blade;

    }
}
