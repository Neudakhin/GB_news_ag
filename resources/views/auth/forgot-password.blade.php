@extends('layouts.main')
@section('content')
    <div class="offset-2 col-8 offset-2">
        @include('components.inc.message')
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Забыли свой пароль? Не проблема. Просто сообщите нам свой адрес электронной почты, и мы вышлем вам ссылку для сброса пароля, которая позволит вам указать новый.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Сбросить пароль') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
