@extends('layouts.admin')
@section('content')
    <h2>Новости</h2>
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
                    <td>DRAFT</td>
                    <td><a href="#">Ред.</a> <a href="#">Уд.</a></td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6">Нет данных</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
