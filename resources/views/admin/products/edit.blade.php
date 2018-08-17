@extends('layouts.app')
@section('content')




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
				<label for="name">Status</label>
				<select name="status" id="status" class="form-control">

					<option value="0">Out of Stock</option>
					<option value="1">In Stock</option>
				  	<option value="2">Pre Order</option>
				  	<option value="3">Hot Deal</option>
				  	
				  
				</select>
			</div>

			<div class="form-group">
				<label for="category">Select subcategory</label>
				<select name="sub_category_id" id="category" class="form-control">
					
					@foreach($s as $category)
				  
				  	<option value="{{ $category->id }}"
				  		
						@if($p->sub_category_id == $category->id)
								selected
						@endif
						

				  		>{{ $category->name }}</option>
				  	@endforeach
				</select>
			</div>


			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" name="price" class="form-control" value="{{ $p->price }}">
			</div>

			<div class="form-group">
				<label for="name">Brand</label>
				<input type="text" name="brand" class="form-control" value="{{ $profile->brand }}">
			</div>

			<div class="form-group">
				<label for="name">Poin</label>
				<input type="text" name="poin" class="form-control" value="{{ $profile->poin }}">
			</div>

			<div class="form-group">
				<label for="name">Pabrik-kode</label>
				<input type="text" name="pabrik_product" class="form-control" value="{{ $profile->pabrik_product }}">
			</div>

			<div class="form-group">
				<label for="name">Kode-product</label>
				<input type="text" name="kode_product" class="form-control" value="{{ $profile->kode_product }}">
			</div>

			<div class="form-group">

				<label for="tags">Select tags</label>
				<div class="d-flex flex-wrap">
				@foreach($t as $tag)
					<div class="custom-checkbox m-1">
						<label><input type="checkbox" value="{{ $tag->id }}" name="tag[]"
							@foreach($p->tag as $ta)
							@if($tag->id == $ta->id)
								checked
							@endif
							@endforeach
							>{{ $tag->tag }}</label>
					</div>

				@endforeach
				</div>
				
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
