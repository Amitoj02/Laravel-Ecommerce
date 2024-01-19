@props([
    'disabled' => false,
    'value' => ''
    ])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge() !!} value="{{$value}}">
