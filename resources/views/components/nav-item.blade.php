<li {{$attributes->merge($attrs)}}>
    <x-link
        :customAttrs="$linkAttrs"
        :href="$href"
        :rel="$rel"
        :target="$target"
        :active="$active"
        :active-class="$activeClass"
        :disabled="$disabled"
        :exact="$exact"
        :exact-active-class="$exactActiveClass"
        :class="$linkClasses">{{$slot}}</x-link>
</li>
