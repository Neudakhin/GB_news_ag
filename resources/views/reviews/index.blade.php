@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between">
        <h2>Отзывы о работе</h2>
        <a href="{{ route('reviews.create') }}" class="btn btn-success align-self-start">Оставить отзыв</a>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($reviews as $review)
            <div class="col">
                    <div class="card-body">
                        <p class="card-text">{{ $review->text }}</p>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex flex-column align-items-end">
                                <small class="text-muted">{{ $review->name }}</small>
                                <small class="text-muted">{{ $review->created_at }}</small>
                            </div>
                        </div>
                    </div>
            </div>
        @empty
            Нет записей.
        @endforelse
    </div>
    {{ $reviews->links() }}
@endsection
