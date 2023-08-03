@php use App\Enums\RoleEnum; @endphp
@extends('layouts.base')

@section('header')
    @livewireStyles
@endsection

@section('content')
    <div>

        @include('layouts.headers.common-header')

        <div class="row mt-5">
            @if(auth()->user()->role == RoleEnum::Admin->value)
                <livewire:admin.notify/>
            @endif

        </div>

    </div>

    @livewireScripts
@endsection
