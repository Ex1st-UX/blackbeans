@if (session('success'))
<div class="alert alert-success" role="alert">
    <strong>Успешно!</strong>{{ session('success') }}
</div>
@endif
