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
                    <img class="member-avatar img-circle" src="{{ $member->avatar }}" alt="{{ $member->name }}">
                </div>
                <div class="col-sm-8 center-block">
                    <strong><span style="font-size: 20px" class="member-name red">{{ $member->name }}</span></strong>
                    <p>{{ $member->description }}</p>
                    @foreach($member->positions as $position)
                        <span class="label label-primary ">{{ $position->name_bg }}</span>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>
@endsection
