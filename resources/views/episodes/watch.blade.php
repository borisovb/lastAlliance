@extends('main.base')


@section('specificTags')
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
