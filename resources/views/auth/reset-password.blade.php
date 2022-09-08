@extends('layouts.main')
@section('content')
    <div class="offset-2 col-8 offset-2">
        @include('components.inc.message')
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="password" :value="__('Пароль')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Подтвердите пароль')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Сбросить пароль') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
