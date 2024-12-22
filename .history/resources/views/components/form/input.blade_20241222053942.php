<input type="{{$type}}" name="{{$name}}" @class([
        'form-control',
        'is-invalid'=> $errors->has($name),

    ])
    value="{{ old($name, $category->name) ?? $category->name }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror