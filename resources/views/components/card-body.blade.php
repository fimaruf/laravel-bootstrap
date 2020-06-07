<{{$tag}} {{$attributes->merge(["class"=>join(" ",$classList)])}}>
@if($title)
    <x-card-title :tag="$titleTag" :class="$titleClass">
        {{$title}}
    </x-card-title>
@endif
{{$slot}}
</{{$tag}}>
