@extends('main.base')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h2 class="text-center red">{{ $episode->name_bg }}</h2>
            <h4><a class="episode-title" href="{{ route('view_project', $episode->project->slug) }}">{{ $episode->project->title }}</a></h4>
            <hr>
            <div style="margin: 9px" class="row">
            <span style="font-size: 20px"><strong> Епизод:</strong> {{ $episode->number }}</span>
            @if($next)
                <a  style="margin-left: 10px;" href="{{ route('watch_episode', $next->slug) }}" class="btn btn-danger btn-pressure pull-right">Следващ</a>
            @endif

            @if($previous)
                <a href="{{ route('watch_episode', $previous->slug) }}" class="btn btn-danger btn-pressure pull-right">Предишен</a>
            @endif
            </div>


            <iframe class="video-frame" src="{{ $embedUrl }}"
                    frameborder="0" allowfullscreen>
            </iframe>
        </div>
    </div>
@endsection