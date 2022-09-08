@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2>Отзывы</h2>
        <a href="{{ route('admin.reviews.create') }}" class="btn btn-success align-self-start">Добавить отзыв</a>
    </div>
    @include('components.inc.message')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Отзыв</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->text }}</td>
                    <td class="col-1">
                        <a class="btn btn-success mb-1 w-100" href="{{ route('admin.reviews.edit', $review) }}">Ред.</a>
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit">Уд.</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Нет данных</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $reviews->links() }}
@endsection
