@if($header)
    <{{$headerTag}} class="{{$headerAttrs["class"]}}">{{$header}}</{{$headerTag}}>
@else
    {!! $headerHtml !!}
@endif
@if($lead)
    <{{$leadTag}} class="{{$leadAttrs["class"]}}">{{$lead}}</{{$leadTag}}>
@else
    {!! $leadHtml !!}
@endif
{{$slot}}
