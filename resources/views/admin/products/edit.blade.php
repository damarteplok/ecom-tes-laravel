@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-8 offset-2">

@include('session.error')

<div class="card">
	<div class="card-header">Edit product: {{ $p->name }}</div>
	<div class="card-body">
		<form action="{{ route('products.update', ['id' => $p->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="{{ $p->name }}">
			</div>

			

			<div class="form-group">
				<label for="image">Featured image</label>
				<input type="file" name="image" class="form-control">
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" name="price" class="form-control" value="{{ $p->price }}">
			</div>


			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="summernote" cols="5" rows="5" class="form-control">{{ $p->description }}</textarea>
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Update product</button>
				</div>
			</div>

		</form>
	</div>
</div>


</div>
</div>
</div>

@stop

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<script>
	$('#summernote').summernote({
        
        tabsize: 2,
        height: 100
      });


</script>

@stop
