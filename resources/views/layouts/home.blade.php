@extends('layouts.base')

@section('header')
    @livewireStyles
@endsection

@section('content')
    <div class="card text-center mt-5">

        @include('layouts.auth-header')

        <div class="card-body gy-2 gx-3 align-items-center">

            <div class="tab-content">
                <livewire:auth.login/>
                <livewire:auth.register/>
                <livewire:auth.forgot-password/>
            </div>

            <div class="card-footer text-muted">
            </div>

        </div>

    </div>

    @livewireScripts
@endsection
