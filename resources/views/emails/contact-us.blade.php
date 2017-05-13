@extends('main/base')

@section('content')
    <div class="container-fluid">
        <div class="row">
                <h2 class=>Изпрате ни съобщение</h2>
                <hr>

            <div class="col-md-8">
                <form class="form-horizontal" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label" >Име*</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Имейл адрес*</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email@mail.com" required>
                        </div>
                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="skype" class="col-md-4 control-label">Тема*</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" required>
                        </div>
                        @if($errors->has('subject'))
                            <span class="help-block">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label" for="content">
                            Съобщение*
                        </label>
                        <div class="col-md-6">
                            <textarea aria-describedby="contentHelp" class="form-control" id="content" name="content" rows="4" >{{ old('content') }}</textarea>
                            <small id="contentHelp" class="form-text">Моля напишете детайлно съобщение.</small>
                        </div>
                        @if($errors->has('content'))
                            <span class="help-block">{{ $errors->first('content') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textarea">
                            Валидация*
                        </label>
                        <div class="col-md-6">
                            <div class="g-recaptcha" data-sitekey="6Lc3PyAUAAAAAPqG_VDbXycbHgW2lj2wmtc3lCeu"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-danger btn-pressure btn-sensitive">
                                Изпрати
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
