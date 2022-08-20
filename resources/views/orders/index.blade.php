@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between">
        <h2>Заказ новостей</h2>
        <a href="{{ route('orders.create') }}" class="btn btn-success align-self-start">Создать заказ</a>
    </div>
@endsection
