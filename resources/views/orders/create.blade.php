@extends('layouts.main')
@section('content')
    <h2>Форма заказа</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="name" class="col-form-label">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="col-6">
                <label for="phone" class="col-form-label">Номер телефона</label>
                <input type="tel" name="phone" id="phone" class="form-control" {{ old('phone') }}>
            </div>
            <div class="col-6">
                <label for="email" class="col-form-label">Email-адрес</label>
                <input type="email" name="email" id="email" class="form-control" {{ old('email') }}>
            </div>
            <div class="col-6">
                <label for="order" class="col-form-label">Описание к заказу</label>
                <textarea class="form-control" name="order" id="order" rows="5" {{ old('order') }}></textarea>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
