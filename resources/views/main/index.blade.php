@extends('main.base')

@section('specificTags')
    <link href="{{ asset('css/lib/bxSlider.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components/latestEpisodesSlider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components/latestBlogPosts.css') }}">
@endsection

@section('content')
    @include('main.latestEpisodes')
    @include('main.latestBlogPosts')
@endsection

@section('scripts')
    <script src="{{ asset('js/bxSlider.min.js') }}"></script>
    <script src="{{ asset('js/bxSliderSettings.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
@endsection