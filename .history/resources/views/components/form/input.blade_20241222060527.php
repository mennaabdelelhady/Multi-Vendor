@props(['name', 'value'=>'', 'type' =>'text'])

<input
    type="{{$type}}" 
    name="{{$name}}" 
    value="{{ old($name, $value) }}"
    {{ $attributes->class([
        'form-control' => true,
        'is-invalid' => $errors->has($name)
    ]) }}
> 
@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror