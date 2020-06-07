<div {{$attributes->merge($attrs)}}>
    @if($split)
        <x-button
            :disabled="$disabled"
            :variant="$splitVariant?$splitVariant:$variant"
            :block="$block"
            :size="$size">
            @if($buttonContent)
                {!! $buttonContent !!}
            @elseif($text)
                {{$text}}
            @else
                {!! $html !!}
            @endif
        </x-button>
    @endif
    <x-button
        :disabled="$disabled"
        :variant="$variant"
        :data-flip="(!$noFlip)?'true':'false'"
        :data-boundary="$boundary"
        :class="'dropdown-toggle'.($split?' dropdown-toggle-split':'').($noCaret && !$split?' dropdown-toggle-no-caret':'')"
        id="dropdownMenuButton"
        data-toggle="dropdown"
        :block="!$split&&$block"
        :data-offset="$offset"
        :href="$splitHref"
        :size="$size"
        aria-haspopup="true" aria-expanded="false">
        @if(!$split)
            @if($buttonContent)
                {!! $buttonContent !!}
            @elseif($text)
                {{$text}}
            @else
                {!! $html !!}
            @endif
        @endif
    </x-button>
    <div class="{{$menuClass}}" aria-labelledby="dropdownMenuButton">
        {{$slot}}
    </div>
</div>
