@extends('layouts.admin')
@section('content')
    <h2 class="mt-4 mb-2">Редактирование отзыва</h2>
    @include('components.inc.message')
    <form action="{{ route('admin.reviews.update', $review) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="name" class="col-form-label">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $review->name }}">
            </div>
            <div class="col-6">
                <label for="text" class="col-form-label">Отзыв</label>
                <textarea class="form-control" name="text" id="text" rows="5">{{ $review->text }}</textarea>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
