@extends('layouts.app')
@section('content')


@include('session.success')
@include('session.error')

<div class="card">
	<div class="card-header">Update SubCategory : {{ $category->name }}</div>
	<div class="card-body">
		<form action="{{ route('subcategory.update',['id' => $category->id]) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="form-group">
				<label for="category">Select category</label>
				<select name="category_id" id="category" class="form-control">
					
					@foreach($categories as $c)
				  
				  	<option value="{{ $c->id }}"
				  		
						@if($category->category_id == $c->id)
								selected
						@endif
						

				  		>{{ $c->name }}</option>
				  	@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" value="{{ $category->name }}" name="name" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">update subcategory</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop