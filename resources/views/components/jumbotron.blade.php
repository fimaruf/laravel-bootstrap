<{{$tag}} {{$attributes->merge($attrs)}}>
@if($shouldWrap)
    <x-container :class="$containerClass"
                 :fluid="$containerFluid">
        @include('components.jumbotron-template')
    </x-container>
@else
    @include('components.jumbotron-template')
@endif
</{{$tag}}>
