@extends('main.base')

@section('specificTags')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/blogPosts.css') }}">
@endsection

@section('content')
    <h2>{{ $post->title }}</h2>
    <hr>
    <img class="blogPost-image" src="{{ $post->image }}">
    <br><br>
    <p class="blogPost-content">{{ $post->content }}</p>
    <hr>
    <div class="pull-left">
        <b>Автор:</b> <br>
        <img class="author img-circle" src="{{ $post->owner->avatar }}">
        {{ $post->owner->name }}
    </div>
    <p class="pull-right">
            <b>Дата:</b><br>
            {{ $post->created_at->format('d M Y') }}</p>



@endsection
