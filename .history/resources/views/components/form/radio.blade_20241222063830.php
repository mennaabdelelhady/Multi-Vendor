

@foreach($options as $value=>$text)

<div class="form-check">
    <input class="form-check-input" type="radio" name="status" value="{{ $value }}" 
        @checked(old('status',$category->status) == 'active')>
    <label class="form-check-label">
        {{ $text }}
    </label>

@endforeach