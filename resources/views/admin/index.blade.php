@extends('main/base')

@section('content')
    <h1>{{ dd(Auth::user()->getRoles()) }}</h1>
@endsection