@extends('main.base')

@section('content')

@foreach($posts as $post)
    {{ $post->title }} <br>
    {{ $post->image }} <br>
    {{ $post->content }} <br>
    {{ $post->owner->name }} <br>
    {{ $post->created_at->format('d.m.Y') }}  <hr>
@endforeach
<div class="text-center">
    @include('pagination.default', ['paginator' => $posts])
</div>
@endsection
