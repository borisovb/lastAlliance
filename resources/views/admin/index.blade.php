@extends('main/base')

@section('content')
    <h1 class="text-center">Админ панел</h1>
    <a href="{{route('admin_blog')}}" class="btn btn-info">НАСТРОЙКИ ЗА БЛОГА</a>
    <a href="{{route('admin_general')}}" class="btn btn-info">НАСТРОЙКИ ЗА САЙТА</a>
    {{--<a href="{{route('admin_blog')}}" class="btn btn-info">ЕКИП</a>--}}
@endsection