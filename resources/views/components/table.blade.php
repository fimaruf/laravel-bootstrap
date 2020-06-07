@if($responsive)
    <div class="{!! $wrapper !!}">
        @endif
        <table {{$attributes->merge($attrs)}}>
            @if($caption)
                <caption>{!! $caption !!}</caption>
            @endif
            @if($fields)
                <x-thead :head-variant="$headVariant" :class="$theadClass">
                    <x-tr :class="$theadTrClass">
                        @foreach( $fields as $field)
                            <x-th
                                :variant="$getField($field,'variant')"
                                :colspan="$getField($field,'colspan')"
                                :rowspan="$getField($field,'rowspan')"
                            >
                                {!! $field['label'] !!}
                            </x-th>
                        @endforeach
                    </x-tr>
                </x-thead>
            @endif
            @if($items)
                <x-tbody :class="$tbodyClass">
                    @foreach($items as $item)
                        <x-tr :class="$tbodyTrClass">
                            @foreach($fields as $field)
                                <x-td
                                    :variant="$getField($field,'variant')"
                                    :colspan="$getField($field,'colspan')"
                                    :rowspan="$getField($field,'rowspan')"
                                >
                                    {!! $getValue($item,$field,$field['key']) !!}
                                </x-td>
                            @endforeach
                        </x-tr>
                    @endforeach
                </x-tbody>
            @endif
            @if($fields && $footClone)
                <x-tfoot :foot-variant="$footVariant" :class="$tfootClass">
                    <x-tr :class="$tfootTrClass">
                        @foreach( $fields as $field)
                            <x-th
                                :variant="$getField($field,'variant')"
                                :colspan="$getField($field,'colspan')"
                                :rowspan="$getField($field,'rowspan')"
                            >
                                {!! $field['label'] !!}
                            </x-th>
                        @endforeach
                    </x-tr>
                </x-tfoot>
            @endif
            {{$slot}}
        </table>
        @if ($responsive)
    </div>
@endif
