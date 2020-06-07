@if($items)
    <{{$tag}} {{$attributes->merge($attrs)}}>
    @foreach($items as $item)
        <x-list-group-item
            :active="$getItemValue($item,'itemActiveField')"
            :disabled="$getItemValue($item,'itemDisabledField')"
            :tag="$itemTag"
            :button="$itemButton"
            :variant="$getItemValue($item,'itemVariantField')"
            :href="$getItemValue($item,'itemHrefField')"
            :rel="$getItemValue($item,'itemRelField')"
            :target="$getItemValue($item,'itemTargetField')"
            :active-class="$itemActiveClass"
            :exact="$getItemValue($item,'itemExactField')"
            :exact-active-class="$itemExactActiveClass"
        >{!! $getItemValue($item,'itemTextField') !!}</x-list-group-item>
    @endforeach
    </{{$tag}}>
@else
    <{{$tag}} {{$attributes->merge($attrs)}}>{{$slot}}</{{$tag}}>
@endif
