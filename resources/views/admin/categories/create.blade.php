@extends('layouts.admin')
@section('content')
    <h2 class="mt-4 mb-2">Добавление категории</h2>
    @include('components.inc.message')
    <form action="{{ route('admin.categories.store') }}" method="POST" >
        @csrf
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="title" class="col-form-label">Название категории</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="col-6">
                <label for="description" class="col-form-label">Описание</label>
                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
