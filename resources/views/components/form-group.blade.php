<div {{$attributes->merge($attrs)}}>
    @if($label)
        <x-form-group-label
            :for="$labelFor"
            :size="$labelSize"
            :sr-only="$labelSrOnly"
            :cols="$labelCols"
            :cols-sm="$labelColsSm"
            :cols-md="$labelColsMd"
            :cols-lg="$labelColsLg"
            :cols-xl="$labelColsXl"
            :align="$labelAlign"
            :align-sm="$labelAlignSm"
            :align-md="$labelAlignMd"
            :align-lg="$labelAlignLg"
            :align-xl="$labelAlignXl"
            :class="$labelClass">
            {{$label}}
        </x-form-group-label>
    @endif
    @if($hasCols)
        <div class="col">
            @endif
            {{$slot}}
            @if($invalidFeedback)
                <x-form-invalid-feedback :aria-live="$feedbackAriaLive" :state="!$state">{{$invalidFeedback}}</x-form-invalid-feedback>
            @endif
            @if($validFeedback)
                <x-form-valid-feedback :aria-live="$feedbackAriaLive" :state="$state">{{$validFeedback}}</x-form-valid-feedback>
            @endif
            @if($description)
                <small id="{{$ariaDescribedBy}}" class="form-text text-muted">{{$description}}</small>
            @endif
            @if($hasCols)
        </div>
    @endif
</div>
