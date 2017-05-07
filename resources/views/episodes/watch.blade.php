@extends('main.base')

@section('content')
    <div class="row">
        <div class="col-md-10">

            <h4><a class="episode-title" href="{{ route('view_project', $episode->project->slug) }}">{{ $episode->project->title }}</a></h4>
            <div style="margin: 9px" class="row">
            <span style="font-size: 20px"><strong> Епизод:</strong> [ {{ $episode->number < 10 ? '0' : '' }}{{ $episode->number }} ] - {{ $episode->name_bg }}</span>
            </div>

            <iframe class="video-frame" src="{{ $embedUrl }}"
                    frameborder="0" allowfullscreen>
            </iframe>

             <br>

            @if($next)
                <a  style="margin-left: 10px;" href="{{ route('watch_episode_slug', [$episode->project->slug, $next->number, $next->slug]) }}" class="btn btn-danger btn-pressure pull-right">Следващ</a>
            @endif

            @if($previous)
                <a href="{{ route('watch_episode_slug', [$episode->project->slug, $previous->number, $previous->slug]) }}" class="btn btn-danger btn-pressure pull-right">Предишен</a>
            @endif

        </div>
    </div>
@endsection
