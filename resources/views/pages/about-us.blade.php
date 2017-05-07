@extends('main/base')

@section('content')
    {{--<h2 class="red">За нас</h2>--}}
    {{--<hr>--}}
    {{--<p>Ние сме малка група от фенсуб ентусиасти, които имат за цел да правят субтитри на любимите си анимета. Стараем се работим качествено, но и с прилична скорост. За нас е важен всеки един компонент от фенсубинга - от превода до караокето и енкодинга. Занапред ще се опитаме да сме по-постоянни в работата си, превеждайки единствено стойностни анимета. Всичко, което правим, е на фен основа. Не целим да получаваме каквито и да е парични облаги. Единствената ни цел е да разпространяваме аниме културата и да го направим родния ни език!--}}
    {{--</p>--}}

    <h2 class="text-center red">Екип</h2>
    <hr>
    <div class="team">
        @foreach($members as $member)
            <div class="row member">
                <div class="avatar-div col-sm-4">
                    <img class="member-avatar" src="{{ $member->avatar }}" alt="">
                </div>
                <div class="col-sm-8">
                    <span style="font-size: 20px">{{ $member->name }}</span>
                    <p>orem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове.
                    </p>

                    @foreach($member->positions as $position)
                        <span class="label label-primary ">{{ $position->name_bg }}</span>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>
@endsection
