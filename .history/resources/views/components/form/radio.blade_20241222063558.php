

@foreach($options as $value=>$text)

<div class="form-check">
    <input class="form-check-input" type="radio" name="status" value="active" @checked(old('status',$category->status) == 'active')>
    <label class="form-check-label">
        Active
    </label>

@endforeach