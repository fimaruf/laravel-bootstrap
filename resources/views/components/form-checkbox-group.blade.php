<div {{$attributes->merge($attrs)}}>
    @foreach($options as $key=>$option)
        <x-form-checkbox
            :value="$getItemValue($option,$valueField)"
            :inline="!$stacked"
            :plain="$plain"
            :button="$buttons"
            :button-variant="$buttonVariant"
            :aria-label="null"
            :aria-labeledby="null"
            :id="$id.'-option-'.$key"
            :name="$name"
            :disabled="$disabled || $getItemValue($option,$disabledField)"
            :required="$required"
            :form="$form"
            :autofocus="$autofocus"
            :size="$size"
            :state="$state"
            :unchecked-value="null"
            :switch="$switch"
        >
            @if(isset($option->$textField))
                {{$getItemValue($option,$textField)}}
            @else
                {!! $getItemValue($option,$textField) !!}
            @endif
        </x-form-checkbox>
    @endforeach
</div>
