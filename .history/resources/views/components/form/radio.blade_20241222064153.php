@props(['name','options','checked'=>false])

@foreach($options as $value=>$text)

<div class="form-check">
    <input class="form-check-input" type="radio" name={{$name}} value="{{ $value }}" 
        @checked(old($name,$checked) == $value)
        {{ $attributes->merge(['class' => 'form-check-input']) }}
    >
    <label class="form-check-label">
        {{ $text }}
    </label>

@endforeach