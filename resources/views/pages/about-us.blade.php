@extends('main/base')

@section('specificTags')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/about-us.css') }}">
@endsection

@section('content')
    <h2>Екип</h2>
    <hr>
    <div class="team">
        @foreach($members as $member)
            <div class="row member">
                <div class="avatar-div col-sm-4 center-block">
                    <img title="{{ $member->id === 4 ? "Най-добрият енкодер в България" : $member->name }}"
                         class="member-avatar img-circle" src="{{ $member->avatar }}" alt="{{ $member->name }}">
                    <div class="text-center">
                    <strong><span style="font-size: 20px" class="member-name red">{{ $member->name }}</span></strong>
                    </div>
                </div>
                <div class="col-sm-8 center-block">

                    <strong>Описание: </strong>
                    <p class="member-description">{{ $member->description }}</p>
                    <a class="show-info">ПОКАЖИ</a>
                    <br>
                    <strong>Длъжности: </strong>
                    <div class="labels">
                        @foreach($member->positions as $position)
                            <span class="label label-primary ">{{ $position->name_bg }}</span>
                        @endforeach
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/aboutUs.js') }}"></script>
@endsection