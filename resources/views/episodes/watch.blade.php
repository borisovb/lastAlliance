@extends('main.base')


@section('specificTags')
    <meta property="og:site_name" content="lastalliance.eu" />
    <meta property="og:image" content="{{$imagePreview}}" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="720" />
    <meta property="og:type" content="video.other" />
    <meta property="og:title" content="{{$episode->project->title_bg}} - LastAlliance" />
    <meta property="og:description" content="Гледай епизод: [ {{ $episode->number < 10 ? '0' : '' }}{{ $episode->number }} ] - {{ $episode->name_bg }} на {{$episode->project->title_bg}}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/watchEpisodes.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">

            <h4><a class="episode-title" href="{{ route('view_project', $episode->project->slug) }}">{{ $episode->project->title }}</a></h4>
            <div style="margin: 9px" class="row">
            <span style="font-size: 20px"><strong> Епизод:</strong> [ {{ $episode->number < 10 ? '0' : '' }}{{ $episode->number }} ] - {{ $episode->name_bg }}</span>
                <button class="switch btn btn-primary pull-right">Угаси лампите</button>
            </div>

            <iframe class="video-frame video" src="{{ $embedUrl }}"
                    frameborder="0" allowfullscreen>
            </iframe>

             <br>

            @if($next)
                <a  style="margin-left: 10px;" href="{{ route('watch_episode_slug', [$episode->project->slug, $next->number, $next->slug]) }}" class="btn btn-danger btn-pressure pull-right">Следващ &rArr;</a>
            @endif

            @if($previous)
                <a href="{{ route('watch_episode_slug', [$episode->project->slug, $previous->number, $previous->slug]) }}" class="btn btn-danger btn-pressure pull-left">&lArr; Предишен</a>
            @endif
        </div>
    </div>
    <div id='persoff'></div>

@endsection

@section('scripts')
    <script src="{{ asset('js/lights-off.js') }}"></script>
@endsection
