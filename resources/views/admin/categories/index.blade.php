@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2>Категории</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success align-self-start">Добавить категорию</a>
    </div>
    @include('components.inc.message')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th class="w-48" scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td class="col-1">
                        <a class="btn btn-success mb-1 w-100" href="{{ route('admin.categories.edit', $category) }}">Ред.</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit">Уд.</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Нет данных</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
@endsection
