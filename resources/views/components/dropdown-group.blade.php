<li role="presentation">
    <x-dropdown-header :should-wrap="false" :variant="$headerVariant" :class="$headerClasses">{!! $header !!}</x-dropdown-header>
    <ul {{$attributes->merge($attrs)}}>
        {{$slot}}
    </ul>
</li>
