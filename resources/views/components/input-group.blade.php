<{{$tag}} {{$attributes->merge($attrs)}}>
@if($prepend || $prependHtml)
    <div class="input-group-prepend">
        <div class="input-group-text">
            @if($prepend){{$prepend}}@else{!! $prependHtml !!}@endif
        </div>
    </div>
@endif
{{$slot}}
@if($prepend || $prependHtml)
    <div class="input-group-append">
        <div class="input-group-text">
            @if($append){{$append}}@else{!! $appendHtml !!}@endif
        </div>
    </div>
@endif
</{{$tag}}>
