@extends('main/base')

@section('content')
    <span style="font: italic;">*Тази част от сайта е още в разработка!</span>
    <br>
    <div style="padding-top: 25px;" class="container-fluid">
        <h1>Генерални настройки за сайта.</h1>
        <button ></button>
        <form action="{{route('database_drop')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input onclick="return confirm('ВНИМАНИЕ! Това действие е необратимо. Сигурен ли си, че искаш да продължиш?')" class="btn btn-danger" type="submit" value="ИЗТРИЙ БАЗАТА С ДАННИ">
        </form>

    </div>
@endsection