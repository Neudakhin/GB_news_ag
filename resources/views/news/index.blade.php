@extends('layouts.main')
@section('content')
<h2>Новости @isset($category)- {{ $category }}@endif</h2>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @forelse($news as $item)
    <div class="col">
        <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"/>
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $item->title }}</text>
            </svg>

            <div class="card-body">
                <p class="card-text">{{ $item->text }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('news.show', [$item->id]) }}" class="btn btn-sm btn-outline-secondary">Просмотр</a>
                    </div>
                    <div class="d-flex flex-column align-items-end">
                        <small class="text-muted">{{ $item->author }}</small>
                        <small class="text-muted">{{ $item->created_at }}</small>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
        Нет записей.
    @endforelse
</div>
@endsection
