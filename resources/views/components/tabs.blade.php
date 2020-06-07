<{{$tag}} {{$attributes->merge($attrs)}}>
@if($end)
    <div class="{{$contentClass}}">{{$slot}}</div>
@endif
<div class="{!! $navWrapperClass !!}">
    @if(is_array($navLinks))
        <?php $nav_links_index = 0; ?>
        <x-nav tabs
               role="tablist"
               :fill="$fill"
               :justified="$justified"
               :align="$align"
               :pills="$pills"
               :vertical="$vertical"
               :small="$small"
               :card-header="$card"
        >
            @foreach($navLinks as $href=>$text)
                <x-nav-item
                    :active="$active===$nav_links_index"
                    :link-attrs="['id'=>$href.'-tab','data-toggle'=>'tab','role'=>'presentation','aria-selected'=>'true','aria-controls'=>$href]"
                    :href="'#'.$href">{{$text}}</x-nav-item>
                <?php $nav_links_index++; ?>
            @endforeach
        </x-nav>
    @else
        {!! $navLinks !!}
    @endif
</div>
@if(!$end)
    <div class="{{$contentClass}}">{{$slot}}</div>
@endif
</{{$tag}}>
