<div wire:ignore.self class="row gy-2 gx-3 tab-pane  active" id="login">
    @include('layouts.notify')
    <h3 class="card-title text-dark mb-lg-5 fs-4 text-wrap fw-semibold mt-5 mb-4">
        Welcome, kindly login to continue
    </h3>
    <div class="col-md-6 offset-md-3 mb-3 gy-2 gx-3">
        <form wire:submit.prevent="login" class="text-dark">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label"> Email </label>
                <input type="text" wire:model="email" class="form-control" width="">
                @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"> Password </label>
                <input type="password" wire:model="password" class="form-control">
                @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn btn-lg btn-dark"> Login</button>
            </div>
        </form>
    </div>
</div>
