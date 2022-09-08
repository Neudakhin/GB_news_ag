@extends('layouts.main')
@section('content')
    <div class="offset-2 col-8 offset-2">
        @include('components.inc.message')
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Это безопасная область приложения. Пожалуйста, подтвердите свой пароль, прежде чем продолжить.') }}
        </div>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div>
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Подтвердить') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
