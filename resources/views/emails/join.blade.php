@extends('main/base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-center">Кандидатстване за прием в групата</h2>
                <hr>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Опа!</strong> Нещо си объркал.
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Име*</label>
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
                            <input placeholder="email@mail.com" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('skype') ? ' has-error' : '' }}">
                        <label for="skype" class="col-md-4 control-label">Скайп*</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="skype" value="{{ old('skype') }}" required>
                        </div>
                        @if($errors->has('skype'))
                            <span class="help-block">{{ $errors->first('skype') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="position" class="col-md-4 control-label">Длъжност*</label>
                        <div class="col-md-6">
                            <select name="position" class="form-control" required>
                                @foreach($positions as $position)
                                    @if($position->id != 5)
                                        <option value="{{ $position->name_bg }}">{{ $position->name_bg }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('radios') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label" for="radios">Занимавали ли сте се преди с фенсуб ?*
                        </label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label for="radios-0">
                                    <input type="radio" name="radios" id="radios-0" value="Да" required {{ old('radios') == 'Да' ? 'checked' : '' }}>
                                    Да
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radios-1">
                                    <input type="radio" name="radios" id="radios-1" value="Не" {{ old('radios') == 'Не' ? 'checked' : '' }}>
                                    Не
                                </label>
                            </div>
                            @if($errors->has('radios'))
                                <span class="help-block">{{ $errors->first('radios') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="content">
                            Ако имате опит, то къде и какво сте превеждали, редактирали, енкодирали и т.н?
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="content" name="content" rows="4">{{ old('content') }}</textarea>
                            {{--<small class="form-text text">Полетата с "*" са задължителни!</small>--}}
                        </div>
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
