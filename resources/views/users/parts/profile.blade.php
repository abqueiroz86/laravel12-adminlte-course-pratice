<div class="card col-md-10 mx-auto">
    <form action="{{ route('users.updateProfile', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-header">
            <h3 class="card-title">Profile</h3>
        </div>
        
        <div class="card-body">
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="PF" {{ (old('type') ?? $user?->profile?->type) == 'PF' ? 'selected' : '' }}>PF</option>
                    <option value="PJ" {{ (old('type') ?? $user?->profile?->type) == 'PJ' ? 'selected' : '' }}>PJ</option>
                </select>

                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value='{{ old('address') ?? $user?->profile?->address }}'>

                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit Profile</button>
        </div>
    </form>
</div>