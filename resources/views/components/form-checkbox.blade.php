@if($button)
    <div {{$attributes->merge($attrs)}}>
        <label {!! $attributesResolve('labelAttrs') !!}>
            <input {!! $attributesResolve('inputAttrs') !!}>
            {{$slot}}
        </label>
    </div>
@else
    <div {{$attributes->merge($attrs)}}>
        <input {!! $attributesResolve('inputAttrs') !!}>
        <label {!! $attributesResolve('labelAttrs') !!}>
            {{$slot}}
        </label>
    </div>
@endif
