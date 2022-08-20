@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between">
        <h2>Отзывы о работе</h2>
        <a href="{{ route('reviews.create') }}" class="btn btn-success align-self-start">Оставить отзыв</a>
    </div>
@endsection
