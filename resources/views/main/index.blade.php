@extends('main.base')

@section('content')

        <h2>Последни епизоди</h2>
        <hr>

        <div class="row">
        @foreach ($episodes as $episode)
                <div class="col-lg-3 episode-div">

                    <div class="episode-banner-div">
                        <img class="episode-banner" src="{{ $episode->project->banner }}" alt="#">
                    </div>
                    <div class="episode-info-div">
                        <span class="episode-title">{{ $episode->name_bg }}</span>
                        <br>
                        <span class="project-title">{{ $episode->project->title }}</span>
                        <br>
                        <span class="episode-date"><strong>Дата:</strong> {{ $episode->created_at }}</span>
                        <div class="buttons">
                        <button class="btn btn-danger btn-pressure small">Гледай</button>
                        <button class="btn btn-info btn-pressure small">Свали</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-lg-12">
            {!! $episodes->render() !!}
        </div>

@endsection