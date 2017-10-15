@extends('main.base')

@section('specificTags')
    <meta name='og:image' content='{{$post->image}}'>
    <meta name='og:title' content='{{$post->title}}'>
    <meta name='og:description' content='{{$post->content}}'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/blogPosts.css') }}">
@endsection

@section('content')
    <h2>{{ $post->title }}</h2>
    <hr>
    <img class="blogPost-image" src="{{ $post->image }}">

    <br><br>

    <p class="blogPost-content">{!! $content !!}</p>

    @if (Auth::check() && auth()->user()->isAdmin())
        <a href="{{ route('edit_post', $post->id) }}" class="btn btn-success">Редактирай</a>
        <a href="{{ route('delete_post', $post->id) }}" class="btn btn-danger"
           onclick="return confirm('Сигурен ли си, че искаш да изтриеш тази статия??');">Изтрий</a>

    @endif

    <div class="pull-right">
        <div class="fb-share-button" data-href="http://lastalliance.eu/blog/{{$post->id}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Споделяне</a></div>
    </div>
    <br>
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
