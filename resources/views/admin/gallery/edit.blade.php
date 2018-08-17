@extends('layouts.app')
@section('content')




@include('session.error')

<div class="card">
	<div class="card-header">Edit photo: {{ $p->filename }}</div>
	<div class="card-body">
		<form action="{{ route('photo.update', ['id' => $p->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			



			
			<div class="form-group">
				<label for="image">Featured image</label>
				<input type="file" name="filename" class="form-control">
			</div>


			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Update photo</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop




