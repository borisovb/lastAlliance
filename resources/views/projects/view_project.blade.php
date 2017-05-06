@extends('main.base')

@section('content')
    <h2 class="red text-center">{{ $project->title_bg }}</h2>
    <h4 class="red text-center">{{ $project->title  }}</h4>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <img class="episode-banner" src="{{ $project->poster }}" alt="">
        </div>
        <div class="col-md-8" style="font-size: 15px; color: #4b4b4b; margin-top: 50px">
            <h4 class="red  ">Информация</h4>
           <strong>■ Тип: </strong> ТВ <br>
           <strong>■ Жанр: </strong>
                @foreach($project->genres as $genre)
                    - {{ $genre->name }}
                @endforeach
            <br>
           <strong>■ Епизоди: </strong> {{ $project->episodesNum }}<br>
           <strong>■ Година: </strong> {{ $project->year }}<br>
           <strong>■ Времетраене на епизод: </strong> {{ $project->duration }}<br>
            <strong>■ Продуценти: </strong> {{ $project->producer }}<br>
            <strong>■ Повече информация: </strong> <a class="red" href="{{ $project->anidb }}">AniDB</a> | <a class="red" href="{{ $project->mal }}">MAL</a> | <a class="red" href="{{ $project->ann }}">ANN</a><br>
            <h4 class="red  ">По проекта работят</h4>
            <strong>○ Превод: </strong>
                @foreach($project->translators as $translator)
                    - {{ $translator->name }}
                @endforeach
                <br>
            <strong>○ Редакция: </strong>
                @foreach($project->editors as $editor)
                    - {{ $editor->name }}
                @endforeach
                <br>
            <strong>○ Стайлинг: </strong>
                @foreach($project->stylers as $styler)
                    - {{ $styler->name }}
                @endforeach
                <br>
            <strong>○ Караоке: </strong>
                @foreach($project->karaokeMakers as $karaokeMakers)
                    - {{ $karaokeMakers->name }}
                @endforeach
            <br>
            <strong>○ Енкод: </strong>
                @foreach($project->encoders as $encoder)
                    - {{ $encoder->name }}
                @endforeach
            <br>
            <strong>○ Проверка на качеството: </strong>
            @foreach($project->qualityControl as $qualityControl)
                - {{ $qualityControl->name }}
            @endforeach
        </div>
    </div>
    <h3 class="red">Резюме</h3>
    <p>{{ $project->description }}</p>

    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>Епизод №</th>
            <th>Име на епизодa</th>
            <th>Добавен</th>
            <th>Изтегли</th>
            <th>Гледай онлайн</th>
        </tr>
        </thead>
        <tbody>
        @foreach($project->episodes as $episode)
            <tr>
                <th scope="row">{{ $episode->number }}</th>
                <td>{{ $episode->name_bg }}</td>
                <td>{{ $episode->created_at }}</td>
                <td>{{ $episode->download_link }}</td>
                <td>{{ $episode->stream_link }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection