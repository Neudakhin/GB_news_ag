@extends('layouts.admin')
@section('content')
    <h2 class="mt-4 mb-2">Добавление заказа</h2>
    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="name" class="col-form-label">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $order->name }}">
            </div>
            <div class="col-6">
                <label for="phone" class="col-form-label">Номер телефона</label>
                <input type="tel" name="phone" id="phone" class="form-control" value={{ $order->phone }}>
            </div>
            <div class="col-6">
                <label for="email" class="col-form-label">Email-адрес</label>
                <input type="email" name="email" id="email" class="form-control" value={{ $order->email }}>
            </div>
            <div class="col-6">
                <label for="description" class="col-form-label">Описание к заказу</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{ $order->description }}</textarea>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
