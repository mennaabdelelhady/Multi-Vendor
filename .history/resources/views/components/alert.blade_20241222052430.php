@if (Session()->has('success'))
<div class="alert alert-success">
    {{ Session('success') }}
</div>   
@endif


@if (Session()->has('info'))
<div class="alert alert-info">
    {{ Session('info') }}
</div>   
@endif