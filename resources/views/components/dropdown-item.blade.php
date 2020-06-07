<li role="presentation">
    @if($href)
        <x-link
            role="menuitem"
            :href="$href"
            :rel="$rel"
            :target="$target"
            :active="$active"
            :disabled="$disabled"
            :active-class="$activeClass"
            :exact="$exact"
            :exact-active-class="$exactActiveClass"
            :class="$linkClass"
        >{{$slot}}</x-link>
    @else
        {{$slot}}
    @endif
</li>
