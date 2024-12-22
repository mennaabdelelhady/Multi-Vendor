@props([
    'name', 'value'=>'','label'=>false
    ])

@if($label)
<label for="">{{$label}}</label>
@endif
<textarea
    type="{{$type}}" 
    name="{{$name}}" 
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ]) }}
> 
value="{{ old($name, $value) }}"
@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror