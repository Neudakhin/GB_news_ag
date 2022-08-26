@extends('layouts.admin')
@section('content')
    <h2>Категории</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                    <td><a href="#">Ред.</a> <a href="#">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Нет данных</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
