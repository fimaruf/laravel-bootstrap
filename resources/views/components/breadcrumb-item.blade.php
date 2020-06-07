<{{$tag}} {{$attributes->merge(['class'=>join(' ',$classList)])}}>
@if($href)
    <x-link :href="$href" :target="$target" :rel="$rel" :disabled="$disabled">
        @if($text) {{$text}} @else {{$slot}} @endif
    </x-link>
@else
    {{$slot}}
@endif
</{{$tag}}>
