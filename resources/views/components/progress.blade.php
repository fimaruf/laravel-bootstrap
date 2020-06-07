<div {{$attributes->merge($attrs)}}>
    @if($value!==null && $showProgress)
        <x-progress-bar
            :variant="$variant"
            :striped="$striped"
            :animated="$animated"
            :max="$max"
            :value="$value"
            :label="$label"
            :precision="$precision"
        >@if($showValue){{$value}}@endif</x-progress-bar>
    @else
        {{$slot}}
    @endif
</div>
