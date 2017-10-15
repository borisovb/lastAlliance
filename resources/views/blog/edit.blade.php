@extends('main/base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center">Редакция на статия</h1>
            <hr>

            @include('flash::message')
            <div class="col-md-8">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Опа!</strong> Нещо си объркал.
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="title">Заглавие</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="title" value="{{$post->title}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="content">Съдържание</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="content" name="content" rows="10">{{$post->content}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="image">Картинка</label>
                        <div class="col-md-7">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-5">
                            <button type="submit" class="btn btn-danger btn-pressure btn-sensitive">Запази</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection