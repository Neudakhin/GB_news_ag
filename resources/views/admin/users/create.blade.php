@extends('layouts.admin')
@section('content')
    <h2 class="mt-4 mb-2">Добавление пользователя</h2>
    @include('components.inc.message')
    <form action="{{ route('admin.users.store') }}" method="POST" >
        @csrf
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="name" class="col-form-label">Логин</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="col-6">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="col-6">
                <label for="password" class="col-form-label">Пароль</label>
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="col-6">
                <label for="password_confirmation" class="col-form-label">Повторите пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="col-6 form-check mt-3">
                <input class="form-check-input" type="checkbox" value="1" id="is_admin" name="is_admin">
                <label class="form-check-label" for="is_admin">
                    Администратор
                </label>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
