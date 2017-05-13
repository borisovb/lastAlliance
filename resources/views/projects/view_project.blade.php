@extends('main.base')
@section('specificTags')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/project.css') }}">

@endsection
@section('content')
    <h2>{{ $project->title_bg }}</h2>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <img class="project-poster" src="{{ $project->poster }}" alt="">
        </div>
        <div class="col-md-8">
            <h3 class="red">Информация</h3>
           <strong>■ Тип: </strong> ТВ серии <br>
           <strong>■ Жанр: </strong>
                @foreach($project->genres as $genre)
                     {{ $genre->name_bg }}
                    @if($project->genres->last() != $genre)
                        |
                    @endif
                @endforeach
            <br>
           <strong>■ Епизоди: </strong> {{ $project->episodesNum }}<br>
           <strong>■ Година: </strong> {{ $project->year }}<br>
           <strong>■ Времетраене на епизод: </strong> {{ $project->duration }}<br>
            <strong>■ Продуценти: </strong> {{ $project->producer }}<br>
            <strong>■ Повече информация: </strong>

            @if($project->mal)
                <a target="_blank" class="red" href="{{ $project->anidb }}">AniDB</a> | <a target="_blank" class="red" href="{{ $project->mal }}">MAL</a> | <a target="_blank" class="red" href="{{ $project->ann }}">ANN</a><br>
            @else
                <a class="red" href="{{ $project->anidb }}">IMDB</a>
            @endif


            <h3 class="red  ">По проекта работят</h3>
            <strong>○ Превод: </strong>
                @foreach($project->translators as $translator)
                     {{ $translator->name }}
                @if($project->translators->last() != $translator)
                    |
                @endif
                @endforeach
                <br>
            <strong>○ Редакция: </strong>
                @foreach($project->editors as $editor)
                     {{ $editor->name }}
                @if($project->editors->last() != $editor)
                    |
                @endif
                @endforeach
                <br>
            <strong>○ Стайлинг: </strong>
                @foreach($project->stylers as $styler)
                     {{ $styler->name }}
                @if($project->stylers->last() != $styler)
                    |
                @endif
                @endforeach
                <br>
            <strong>○ Караоке: </strong>
                @foreach($project->karaokeMakers as $karaokeMakers)
                     {{ $karaokeMakers->name }}
                @if($project->karaokeMakers->last() != $karaokeMakers)
                    |
                @endif
                @endforeach
            <br>
            <strong>○ Енкод: </strong>
                @foreach($project->encoders as $encoder)
                     {{ $encoder->name }}
                @if($project->encoders->last() != $encoder)
                    |
                @endif
                @endforeach
            <br>
            <strong>○ Проверка на качеството: </strong>
            @foreach($project->qualityControl as $qualityControl)
                 {{ $qualityControl->name }}
            @endforeach
        </div>
    </div>
    <h3 class="red">Резюме</h3>
    <p>{{ $project->description }}</p>

    <table class="table">
        <thead class="thead-inverse red">
        <tr>
            <th>Епизод №</th>
            <th>Име на епизодa</th>
            <th>Дата на добавяне</th>
            <th>Изтегли</th>
            <th>Гледай онлайн</th>
        </tr>
        </thead>
        <tbody>
        @foreach($project->episodes as $episode)
            <tr>
                <th scope="row">{{ $episode->number }}</th>
                <td>{{ $episode->name_bg }}</td>
                <td>{{ $episode->created_at->format('d.m.Y') }}</td>
                <td>
                @if($episode->download_link)
                    <a target="_blank" href="{{ $episode->download_link }}" class="btn btn-danger btn-pressure small">Изтегли</a>
                @else
                    Няма
                @endif
                </td>
                <td>
                @if($episode->stream_link)
                    <a href="{{ route('watch_episode_slug', [$episode->project->slug, $episode->number, $episode->slug]) }}" class="btn btn-primary btn-pressure small">Гледай</a>
                @else
                    Няма
                @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
