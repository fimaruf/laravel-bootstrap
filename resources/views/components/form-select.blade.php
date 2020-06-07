<select {{$attributes->merge($attrs)}}>
    @if(is_array($options) && count($options))
        @foreach($options as $option)
            <option {!! $selectedAttr($option) !!} value="{{$getItem($option,'value')}}">{{$getItem($option,'text')}}</option>
        @endforeach
    @endif
    {{$slot}}
</select>
