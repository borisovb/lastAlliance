@extends('main/base')

@section('content')
    {{--<h2 class="red">За нас</h2>--}}
    {{--<hr>--}}
    {{--<p>Ние сме малка група от фенсуб ентусиасти, които имат за цел да правят субтитри на любимите си анимета. Стараем се работим качествено, но и с прилична скорост. За нас е важен всеки един компонент от фенсубинга - от превода до караокето и енкодинга. Занапред ще се опитаме да сме по-постоянни в работата си, превеждайки единствено стойностни анимета. Всичко, което правим, е на фен основа. Не целим да получаваме каквито и да е парични облаги. Единствената ни цел е да разпространяваме аниме културата и да го направим родния ни език!--}}
    {{--</p>--}}

    <h2 class="text-center">Екип</h2>
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
