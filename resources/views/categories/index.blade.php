@extends('layouts.main')
@section('content')
<h2>Категории</h2>
<ul class="list-group list-group-flush">
    @forelse($categories as $category)
        <li class="list-group-item">
            <a href="{{ route('news.categories',[$category]) }}">
                {{ $category }}
            </a>
        </li>
    @empty
        Нет категорий.
    @endforelse
</ul>
@endsection
