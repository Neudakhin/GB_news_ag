@extends('layouts.main')
@section('content')
    <h2>Форма отзывов</h2>
    <form method="post" action="{{ route('reviews.store') }}">
        @csrf
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="name" class="col-form-label">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="col-6">
                <label for="review" class="col-form-label">Отзыв</label>
                <textarea class="form-control" name="review" id="review" rows="5"></textarea>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
