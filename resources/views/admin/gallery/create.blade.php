@extends('layouts.app')
@section('content')



			@include('session.success')
			@include('session.error')

		
			<div class="card">
				<div class="card-header">Createa a new photo</div>
				<div class="card-body">
					<form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="image">Featured image</label>
							<input type="file" name="filename" class="form-control">
						</div>

						<input type="hidden" name="product_id" value="{{ $id }}">
						

						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Save photo</button>
							</div>
						</div>

					</form>
				</div>
			</div>			


@stop

