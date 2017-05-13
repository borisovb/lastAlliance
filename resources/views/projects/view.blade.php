@extends('main.base')

@section('specificTags')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components/projectbox.css') }}">
@endsection

@section('content')
    <h1>{{ $status }}</h1>
    <hr>
    <div class="row">
    @foreach($projects as $project)
        <a href='{{ route('view_project', $project->slug) }}'>

            <ul class='grid cs-style-3'>
                <li>
                    <figure>
                        <img src='{{ $project->poster }}'>
                        <figcaption>
                            <h5>{{ $project->title }}</h5>
                            <span>{{ $project->title_bg }}</span>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </a>
    @endforeach
    </div>
    <div class="text-center">
        @include('pagination.default', ['paginator' => $projects])
    </div>
@endsection