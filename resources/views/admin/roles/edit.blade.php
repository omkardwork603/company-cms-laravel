<form
    action="{{ route('admin.roles.update', $role) }}"
    method="POST"
>

    @csrf
    @method('PUT')