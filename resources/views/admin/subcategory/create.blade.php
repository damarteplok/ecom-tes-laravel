@extends('layouts.app')
@section('content')


@include('session.success')
@include('session.error')

<div class="card">
	<div class="card-header">Createa a new subcategory</div>
	<div class="card-body">
		<form action="{{ route('subcategory.store') }}" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="category">Select category</label>
				<select name="category_id" id="category" class="form-control">
					
					@foreach($categories as $category)
				  
				  	<option value="{{ $category->id }}">{{ $category->name }}</option>
				  	@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Save</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop