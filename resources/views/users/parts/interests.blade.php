<div class="card col-md-10 mx-auto">
    <form action="{{ route('users.updateInterests', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-header">
            <h3 class="card-title">Interests</h3>
        </div>
        
        <div class="card-body">
            @foreach (['Soccer', 'Baseball', 'NFL'] as $interest)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $interest }}" id="interest" name="interests[][name]" @checked(in_array($interest, old('interests', $user->interests->pluck('name')->toArray())))  >
                    <label class="form-check-label" for="interest">
                        {{ $interest }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit Interests</button>
        </div>
    </form>
</div>