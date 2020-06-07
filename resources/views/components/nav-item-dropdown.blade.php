<li {{$attributes->merge($attrs)}}>
    <x-link :disabled="$disabled"
            :class="$toggleClass"
            :href="'#'.$id"
            data-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false">
        @if($text){{$text}}@else{!! $html !!}@endif
    </x-link>
    <ul class="{!! $menuClass !!}" x-placement="top-start">
        {{$slot}}
    </ul>
</li>

