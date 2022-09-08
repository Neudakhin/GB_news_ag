@extends('layouts.admin')
@section('content')
    <h2 class="mt-4 mb-2">Добавление отзыва</h2>
    <form action="{{ route('admin.reviews.store') }}" method="POST" >
        @csrf
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="name" class="col-form-label">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="col-6">
                <label for="text" class="col-form-label">Отзыв</label>
                <textarea class="form-control" name="text" id="text" rows="5"></textarea>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
