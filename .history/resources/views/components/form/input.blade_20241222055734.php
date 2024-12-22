@props(['name', 'value', 'type' ])

<input
    type="{{$type??'text'}}" 
    name="{{$name}}" @class([
        'form-control',
        'is-invalid'=> $errors->has($name)

    ])
    value="{{ old($name, $value) }}"
> 
@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror