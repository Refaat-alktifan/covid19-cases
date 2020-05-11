@extends('layouts.backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="mb-20">{{ __('Seo Info') }}</h4>
		<div class="alert alert-danger none">
			<ul id="errors">

			</ul>
		</div>
		<div class="alert alert-success none">
			<ul id="success">

			</ul>
		</div>
		<form method="post"  id="basicform" action="{{ route('admin.seo.store') }}">
			@csrf			
			<div class="custom-form">
				<div class="row">
					<div class="form-group col-lg-12">
						<label for="title">{{ __('Meta Title') }}</label>
						<input type="text" name="meta_title"  id="title" class="form-control" value="{{ $info->meta_title }}" placeholder="Meta Title">
					</div>
					<div class="form-group col-lg-6">
						<label for="author">{{ __('Author') }}</label>
						<input type="text" name="author"  id="author" class="form-control" value="{{ $info->author }}" placeholder="Author">
					</div>
					<div class="form-group col-lg-6">
						<label for="meta_tags">{{ __('Meta Tags') }}</label>
						<input type="text" name="meta_tags"  id="meta_tags" class="form-control" value="{{ $info->meta_tags }}" placeholder="Meta tags">
					</div>
					<div class="form-group col-lg-12">
						<label for="description">{{ __('Meta description') }}</label>
						<textarea name="meta_description" id="description" class="form-control" cols="30" rows="10">{{ $info->meta_description }}</textarea>
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