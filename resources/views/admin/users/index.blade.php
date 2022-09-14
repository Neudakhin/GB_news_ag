@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2>Пользователи</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success align-self-start">Добавить пользователя</a>
    </div>
    @include('components.inc.message')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Логин</th>
                <th scope="col">Email</th>
                <th scope="col">Роль</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ($user->is_admin) ? 'Администратор' : 'Пользователь' }}</td>
                    <td class="col-1">
                        <a class="btn btn-success mb-1 w-100" href="{{ route('admin.users.edit', $user) }}">Ред.</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit">Уд.</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Нет данных</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection
