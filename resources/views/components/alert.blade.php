
<{{$tag}} role="alert" {{$attributes->merge($attrs)}}>
{{$heading}}{{$slot}}
@if($dismissible)
    <button type="button" class="{{join(' ',['close',$dismissibleClass])}}" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
@endif
</{{$tag}}>
