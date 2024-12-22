@if (Session()->has($type))
<div class="alert alert-success">
    {{ Session($type) }}
</div>   
@endif


