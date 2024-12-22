@props([
    'name', 'value'=>'', 'type' =>'text','label'=>false
    ])

<label for="">{{$label}}</label>
<input
    type="{{$type}}" 
    name="{{$name}}" 
    value="{{ old($name, $value) }}"
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ]) }}
> 
@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror