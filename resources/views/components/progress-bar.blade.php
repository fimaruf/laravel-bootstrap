<div {{$attributes->merge($attrs)}}>@if($label) {!! $label !!} @else{{$slot}}@endif</div>
