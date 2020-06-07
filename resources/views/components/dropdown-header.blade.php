@if($shouldWrap)
    <li role="presentation"><{{$tag}} {{$attributes->merge($attrs)}}>{{$slot}}</{{$tag}}></li>
@else
    <{{$tag}} {{$attributes->merge($attrs)}}>{{$slot}}</{{$tag}}
@endif
