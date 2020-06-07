<div {{$attributes->merge($attrs)}}>
    <div class="{!! $headerClass !!}">
        @if($header)
            {!! $header !!}
        @else
            <strong class="mr-auto">{{$title}}</strong>
            <small class="text-muted">{{$subTitle}}</small>
        @endif
        @if(!$noCloseButton)
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @endif
    </div>
    <div class="{!! $bodyClass !!}">{{$slot}}</div>
</div>
