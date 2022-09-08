@extends('layouts.admin')
@section('content')
    <h2 class="mt-4 mb-2">Добавление новости</h2>
    <form action="{{ route('admin.news.update', $news) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="d-flex align-items-start flex-column">
            <div class="col-6">
                <label for="title" class="col-form-label">Название новости</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}">
            </div>
            <div class="col-6">
                <label for="author" class="col-form-label">Автор</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $news->author }}">
            </div>
            <div class="col-6">
                <label for="category_id" class="col-form-label">Категория</label>
                <select class="form-select" name="category_id" id="category_id">
                    <option selected disabled>Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($news->category_id == $category->id)>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="status" class="col-form-label">Статус</label>
                <select class="form-select" name="status" id="status">
                    <option selected disabled>Выберите статус</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status }}" @selected($news->status == $status)>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="img" class="col-form-label">Изображение</label>
                <input class="form-control" type="file" id="img">
            </div>
            <div class="col-6">
                <label for="text" class="col-form-label">Текст</label>
                <textarea class="form-control" name="text" id="text" rows="5">{{ $news->text }}</textarea>
            </div>
            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </div>
    </form>
@endsection
