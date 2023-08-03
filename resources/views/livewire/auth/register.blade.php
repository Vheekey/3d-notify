<div wire:ignore.self id="register" class="row gy-2 tab-pane fade">
    @include('layouts.notify')

    <div class="col-md-6 offset-md-3 mb-3 gy-2 gx-3">
        <h3 class="card-title theme-text-color mb-lg-5 fs-4 text-wrap fw-semibold mt-5 mb-4">
            Register
        </h3>

        <form wire:submit.prevent.default="register" class="theme-text-color">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label"> Email </label>
                <input type="text" wire:model="resetEmail" class="form-control" width="">
                @error('newEmail') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> Password </label>
                <input type="text" wire:model="newPassword" class="form-control" width="">
                @error('newPassword') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark"> Submit</button>
            </div>

        </form>
    </div>
</div>
