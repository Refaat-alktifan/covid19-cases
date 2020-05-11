@extends('layouts.backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="custom-form">
			<form action="{{ route('admin.script.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="css">{{ __('Header Custom Css') }}</label>
					<textarea cols="30" rows="5" class="form-control" id="css" name="css">{{ $script->css }}</textarea>
				</div>
				<div class="form-group">
					<label for="js">{{ __('Footer Custom Js') }}</label>
					<textarea cols="30" rows="5" class="form-control" id="js" name="js">{{ $script->js }}</textarea>
				</div>
				<button type="submit" class="btn col-12">{{ __('Update') }}</button>
			</form>
		</div>
	</div>
</div>
@endsection