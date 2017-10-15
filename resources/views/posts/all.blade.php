@extends('main.base')

@section('specificTags')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/allBlogPosts.css') }}">
@endsection

@section('content')
<h2>Блог</h2> <hr>
@foreach($posts as $post)
    <section class="blogPosts row">
        <div class="col-md-3">
            <img class="blogPost-img" src="{{ $post->image }}" >
        </div>
        <div class="col-md-9">
            <a href="{{ route('view_post_slug', [$post->id, $post->slug]) }}">
                <h3 class="red">{{ str_limit($post->title, $limit = 50, $end='...') }}</h3>
            </a>
            {{ str_limit($post->content, $limit = 250, $end='...') }}

            <p class="pull-right"> <b>Дата:</b> {{ $post->created_at->format('d.m.Y') }}</p>
        </div>
    </section>
    {{--<br>--}}
    {{--{{ $post->images }} <br>--}}
    {{--{{ $post->content }} <br>--}}
    {{--{{ $post->owner->name }} <br>--}}
    {{--{{ $post->created_at->format('d.m.Y') }}  --}}
    <hr>
@endforeach


<div class="text-center">
    @include('pagination.default', ['paginator' => $posts])
</div>
@endsection

