@extends('layouts.main')
@section('content')
<h2>{{ $news['title'] }}</h2>
<div>
    <strong>Author: {{ $news['author'] }}</strong>
    <p>{{ $news['text'] }}</p>
    <em>Date: {{ $news['created_at'] }}</em>
</div>
@endsection
