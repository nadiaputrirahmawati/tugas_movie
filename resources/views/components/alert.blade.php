@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
    <strong>Error:</strong> Ada beberapa masalah.
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif