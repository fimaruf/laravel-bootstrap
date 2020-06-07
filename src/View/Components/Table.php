<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

Collection::macro('recursive', function () {
    return $this->map(function ($value) {
        if (is_array($value) || is_object($value)) {
            return collect($value)->recursive();
        }
        return $value;
    });
});

class Table extends Component
{
    public ?string $id;
    public ?string $caption;
    public ?Collection $items;
    public ?array $fields;
    public ?string $primaryKey;
    public bool $striped;
    public bool $bordered;
    public bool $borderless;
    public bool $outlined;
    public bool $dark;
    public bool $hover;
    public bool $small;
    public bool $fixed;
    public ?string $responsive;
    public bool $captionTop;
    public ?string $tableVariant;
    public $tableClass;
    public bool $stacked;
    public ?string $headVariant;
    public ?string $headRowVariant;
    public $theadClass;
    public $theadTrClass;
    public bool $footClone;
    public ?string $footVariant;
    public ?string $footRowVariant;
    public $tfootClass;
    public $tfootTrClass;
    public $tbodyTrClass;
    public $tbodyTrAttr;
    public $tbodyClass;

    public array $attrs = [
        "class" => [
            "table"
        ]
    ];
    public array $wrapper = [
        "class" => []
    ];


    /**
     * Create a new component instance.
     *
     * @param string|null $id
     * @param string|null $caption
     * @param array $items
     * @param array|null $fields
     * @param string|null $primaryKey
     * @param bool|null $striped
     * @param bool|null $bordered
     * @param bool|null $borderless
     * @param bool|null $outlined
     * @param bool|null $dark
     * @param bool|null $hover
     * @param bool|null $small
     * @param bool|null $fixed
     * @param bool|null $responsive
     * @param bool|null $captionTop
     * @param string|null $tableVariant
     * @param null $tableClass
     * @param bool|null $stacked
     * @param string|null $headVariant
     * @param string|null $headRowVariant
     * @param null $theadClass
     * @param null $theadTrClass
     * @param bool|null $footClone
     * @param string|null $footVariant
     * @param string|null $footRowVariant
     * @param null $tfootClass
     * @param null $tfootTrClass
     * @param null $tbodyTrClass
     * @param null $tbodyTrAttr
     * @param null $tbodyClass
     */
    public function __construct(
        $items = null,
        ?string $id = null,
        ?string $caption = null,
        ?array $fields = null,
        ?string $primaryKey = null,
        ?bool $striped = null,
        ?bool $bordered = null,
        ?bool $borderless = null,
        ?bool $outlined = null,
        ?bool $dark = null,
        ?bool $hover = null,
        ?bool $small = null,
        ?bool $fixed = null,
        ?string $responsive = null,
        ?bool $captionTop = null,
        ?string $tableVariant = null,
        $tableClass = null,
        ?bool $stacked = null,
        ?string $headVariant = null,
        ?string $headRowVariant = null,
        $theadClass = null,
        $theadTrClass = null,
        ?bool $footClone = null,
        ?string $footVariant = null,
        ?string $footRowVariant = null,
        $tfootClass = null,
        $tfootTrClass = null,
        $tbodyTrClass = null,
        $tbodyTrAttr = null,
        $tbodyClass = null
    )
    {
        $this->id = $id;
        $this->caption = $caption;
        $this->primaryKey = $primaryKey;
        $this->striped = !!$striped;
        $this->bordered = !!$bordered;
        $this->borderless = !!$borderless;
        $this->outlined = !!$outlined;
        $this->dark = !!$dark;
        $this->hover = !!$hover;
        $this->small = !!$small;
        $this->fixed = !!$fixed;
        $this->responsive = $responsive;
        $this->captionTop = !!$captionTop;
        $this->tableVariant = $tableVariant;
        $this->tableClass = is_array($tableClass) ? $tableClass : explode(" ", $tableClass);
        $this->stacked = !!$stacked;
        $this->headVariant = $headVariant;
        $this->headRowVariant = $headRowVariant;
        $this->theadClass = is_array($theadClass) ? $theadClass : explode(" ", $theadClass);
        $this->theadTrClass = is_array($theadTrClass) ? $theadTrClass : explode(" ", $theadTrClass);
        $this->footClone = !!$footClone;
        $this->footVariant = $footVariant;
        $this->footRowVariant = $footRowVariant;
        $this->tfootClass = is_array($tfootClass) ? $tfootClass : explode(" ", $tfootClass);
        $this->tfootTrClass = is_array($tfootTrClass) ? $tfootTrClass : explode(" ", $tfootTrClass);
        $this->tbodyTrClass = is_array($tbodyTrClass) ? $tbodyTrClass : explode(" ", $tbodyTrClass);
        $this->tbodyTrAttr = is_array($tbodyTrAttr) ? $tbodyTrAttr : explode(" ", $tbodyTrAttr);
        $this->tbodyClass = is_array($tbodyClass) ? $tbodyClass : explode(" ", $tbodyClass);

        if ($this->id) $this->attrs["id"] = $id;
        if ($this->striped) $this->attrs["class"][] = "table-striped";
        if ($this->bordered) $this->attrs["class"][] = "table-bordered";
        if ($this->borderless) $this->attrs["class"][] = "table-borderless";
        if ($this->outlined) $this->attrs["class"][] = "border";
        if ($this->dark) $this->attrs["class"][] = "table-dark";
        if ($this->hover) $this->attrs["class"][] = "table-hover";
        if ($this->small) $this->attrs["class"][] = "table-sm";
        if ($this->fixed) $this->attrs["class"][] = "b-table-fixed";
        if ($this->responsive) {
            if ($this->responsive === true) $this->wrapper["class"][] = "table-responsive";
            else $this->wrapper["class"][] = "table-responsive-$this->responsive";
        }
        if ($this->captionTop) $this->attrs["class"][] = "b-table-caption-top";
        if ($this->tableVariant) $this->attrs["class"][] = "table-$this->tableVariant";
        if ($this->stacked) $this->attrs["class"][] = "b-table-stacked";

        $this->attrs["class"] = implode(" ", $this->attrs["class"]);
        $this->theadClass = implode(" ", $this->theadClass);
        $this->tfootClass = implode(" ", $this->tfootClass);
        $this->tbodyClass = implode(" ", $this->tbodyClass);
        $this->theadTrClass = implode(" ", $this->theadTrClass);
        $this->tbodyTrClass = implode(" ", $this->tbodyTrClass);
        $this->tfootTrClass = implode(" ", $this->tfootTrClass);
        $this->wrapper["class"] = implode(" ", $this->wrapper["class"]);


        if ($items instanceof Collection) {
            $this->items = $items;
        } else {
            $this->items = collect($items);
        }
        $this->items = $this->items->recursive();
        $this->fields = $this->getFields($fields);
    }

    private function getFields($fields)
    {
        $out = [];
        if ($fields && is_array($fields)) {
            foreach ($fields as $field) {
                if (is_array($field)) {
                    /**
                     * It is assumed that $field variable has [key,label] fields
                     * key and label both should be string
                     */
                    if (!isset($field['label'])) {
                        $field['label'] = Str::title($field['key']);
                    }
                    $out[] = $field;
                } else {
                    /**
                     * Here the $field is not an array.
                     * That means the $field itself is the key, we need to make it label also.
                     */
                    $out[] = [
                        "key" => $field,
                        "label" => Str::title($field)
                    ];
                }
            }
        } elseif ($this->items) {
            foreach ($this->items->first() as $key => $item) {
                $out[] = [
                    "key" => $key,
                    "label" => Str::title($key)
                ];
            }
        }
        return $out;
    }

    public function getValue($item, $field, $key)
    {
        if (isset($field['formatter'])) {
            return $field['formatter']($item, $field, $key);
        }
        return $item->get($key);
    }

    public function getField($field, $prop)
    {
        return isset($field[$prop]) ? $field[$prop] : null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.table');
    }
}
