@extends('layouts.backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="mb-20">{{ __('Settings Info') }}</h4>
		@if (count($errors) > 0)
		<div class = "alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form method="post"  action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
			@csrf		
			
			<div class="custom-form">
				<div class="row">
					
					<div class="form-group col-lg-12">
						@if(!empty($info->logo) && file_exists($info->logo))
						<img  src="{{ asset($info->logo) }}"><br>
						@endif
						<label for="logo">{{ __('Select Logo') }}</label>
						<input type="file" name="logo" id="logo" class="form-control" accept="image/*"   onchange="readURL(this);">
					</div>
					<div class="form-group col-lg-12">
						@if(!empty($info->favicon) && file_exists($info->favicon))
						<img  src="{{ asset($info->favicon) }}"><br>
						@endif
						<label for="favicon">{{ __('Select Favicon') }}</label>
						<input type="file" name="favicon" id="favicon" class="form-control" >
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
