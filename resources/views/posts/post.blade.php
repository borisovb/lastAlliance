@extends('main.base')

@section('content')
    <h2>{{ $post->title }}</h2>
    <hr>
    <img src="{{ $post->image }}">
    <p>{{ $post->content }}</p>
    <p>{{ $post->owner->name }}</p>
    <p>{{ $post->created_at->format('d.m.Y') }}</p>
@endsection
