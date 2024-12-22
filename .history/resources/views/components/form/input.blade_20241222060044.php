@props(['name', 'value'=>'', 'type' =>'text'])

<input
    type="{{$type}}" 
    name="{{$name}}" 
    value="{{ old($name, $value) }}"
    {{ $attributes }}
> 
@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror