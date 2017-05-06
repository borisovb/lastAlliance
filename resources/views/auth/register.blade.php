@extends('main/base')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h2 class="text-center">Регистрация</h2>
			<hr>
		@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Опа!</strong> Нещо си объркал.
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Име</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Имейл адрес</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Парола</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Потвърди парола</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-danger btn-pressure btn-sensitive">
									Регистрация
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
</div>
@endsection
