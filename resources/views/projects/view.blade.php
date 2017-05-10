@extends('main.base')

@section('content')
    <h1 class="text-center">{{ $status }}</h1>
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