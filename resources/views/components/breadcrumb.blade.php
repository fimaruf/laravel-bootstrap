@if($wrapper)
    <nav aria-label="{{$ariaLabel}}">@endif
        <{{$tag}} {{$attributes->merge(['class'=>join(' ',['breadcrumb',$variant])])}}>
        @if(is_array($items) && count($items))
            @foreach($items as $index=>$item)
                <x-breadcrumb-item
                    :tag="$itemTag"
                    :text='$getValue("$index.text")'
                    :href='$getValue("$index.href")'
                    :aria-content='$getValue("$index.ariaContent")'
                    :rel='$getValue("$index.rel")'
                    :target='$getValue("$index.target")'
                    :active='!!$getValue("$index.active")'
                    :disabled='!!$getValue("$index.disabled")'
                    :active-class='$getValue("$index.activeClass")'
                    :exact-active-class='$getValue("$index.exactActiveClass")'>
                    @if($getValue("$index.icon"))
                        <x-slot name="icon">{{$getValue("$index.icon")}}</x-slot>
                    @endif
                    Empty
                </x-breadcrumb-item>
            @endforeach
        @else
            {{$slot}}
        @endif
    </{{$tag}}>
    @if($wrapper)</nav>@endif
