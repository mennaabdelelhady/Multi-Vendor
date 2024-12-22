@if (Session()->has($type))
<div class="alert alert-{{$type}}">
    {{ Session($type) }}
</div>   
@endif


