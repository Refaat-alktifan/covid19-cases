@extends('layouts.backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="mb-20">{{ __('Settings Info') }}</h4>
		<div class="alert alert-danger none">
			<ul id="errors">
			</ul>
		</div>
		<div class="alert alert-success none">
			<ul id="success">

			</ul>
		</div>
		<form method="post"  id="basicform" action="{{ route('admin.settings.update',Auth::user()->id) }}">
			@csrf		
			@method('PUT')	
			<div class="custom-form">
				<div class="row">
					<div class="form-group col-lg-12">
						<label for="zoom">{{ __('Zoom labvel') }}</label>
						<input type="text" name="zoom"  id="zoom" class="form-control" value="{{ $info->zoom }}" required="">
					</div>
					<div class="form-group col-lg-12">
						<label for="center_lat">{{ __('Center Latitude') }}</label>
						<input type="text" name="center_lat"  id="center_lat" class="form-control" value="{{ $info->center_lat }}" required="">
					</div>
					<div class="form-group col-lg-12">
						<label for="center_lng">{{ __('Center Longitude') }}</label>
						<input type="text" name="center_lng"  id="center_lng" class="form-control" value="{{ $info->center_lng }}" required="">
					</div>
					<div class="form-group col-lg-12">
						<label for="api">{{ __('Google Map API Key') }}</label>
						<input type="text" name="api"  id="api" class="form-control" value="{{$info->api}}" required="">
					</div>
					<div class="form-group col-lg-12">
						<label for="adds">{{ __('Advertisement Code') }}</label>
					    <textarea class="form-control" name="adds">{{$info->adds}}</textarea>
					</div>
					<div class="form-group col-lg-12">
						<button class="btn col-12" type="submit">{{ __('Update') }}</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection