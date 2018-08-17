@extends('layouts.app')
@section('content')



			@include('session.success')
			@include('session.error')
		
			<div class="card">
				<div class="card-header">Createa a new product</div>
				<div class="card-body">
					<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control">
						</div>

						<div class="form-group">
							<label for="name">brand</label>
							<input type="text" name="brand" class="form-control">
						</div>

						<div class="form-group">
							<label for="name">poin</label>
							<input type="text" name="poin" class="form-control">
						</div>

						<div class="form-group">
							<label for="name">pabrik-kode</label>
							<input type="text" name="pabrik_product" class="form-control">
						</div>

						<div class="form-group">
							<label for="name">kode-product</label>
							<input type="text" name="kode_product" class="form-control">
						</div>
						
						{{-- <div class="form-group">
							<label for="name">pilihan product</label>
							<input type="text" name="pilihan" class="form-control">
						</div> --}}


						<div class="form-group">
							<label for="image">Featured image</label>
							<input type="file" name="image" class="form-control">
						</div>

						<div class="form-group">
			                <label for="featured">Product photos (can attach more than one)</label>
			                <input type="file" name="photos[]" multiple class="form-control">
			            </div>

						<div class="form-group">
							<label for="category">Select subcategory</label>
							<select name="category_id" id="category" class="form-control">
								
								@foreach($categories as $category)
							  
							  	<option value="{{ $category->id }}">{{ $category->category->name }}-{{ $category->name }}</option>
							  	@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" name="price" class="form-control">
						</div>
						
						<div class="form-group">

							<label for="tags">Select tags</label>
							<div class="d-flex flex-wrap">
			 

							@foreach($tags as $tag)
								<div class="custom-checkbox m-1">
									<label><input type="checkbox" value="{{ $tag->id }}" name="tags[]">{{ $tag->tag }}</label>
								</div>

							@endforeach
							</div>
							
						</div>

						<div class="form-group">
							<label for="category">Status</label>
							<select name="status" id="status" class="form-control">

								<option value="0">Out of Stock</option>
								<option value="1">In Stock</option>
							  	<option value="2">Pre Order</option>
							  	<option value="3">Hot Deal</option>
							  	
							  
							</select>
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="summernote" rows="20" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Store product</button>
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
