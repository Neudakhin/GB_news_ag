@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2>Новости</h2>
        <a href="{{ route('admin.news.create') }}" class="btn btn-success align-self-start">Добавить новость</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Автор</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item) }}">Ред.</a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Уд.</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6">Нет данных</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $news->links() }}
@endsection
