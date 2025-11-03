<div class="card col-md-10 mx-auto">
    <form action="{{ route('users.updateRoles', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-header">
            <h3 class="card-title">Roles</h3>
        </div>
        
        <div class="card-body">
            @foreach ($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $role->id }}" id="roles" name="roles[]" @checked(in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())))  >
                    <label class="form-check-label" for="roles">
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit Roles</button>
        </div>
    </form>
</div>