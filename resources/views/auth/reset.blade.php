@extends('main/base')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<h2 class="text-center">Смяна на парола</h2>
				<hr>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Имейл адрес</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Парола</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
							@if($errors->has('password'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Потвърди парола</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
							@if($errors->has('password_confirmation'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-danger btn-pressure">
									Смяна на парола
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection
