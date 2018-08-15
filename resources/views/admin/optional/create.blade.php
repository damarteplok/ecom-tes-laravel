@extends('layouts.app')
@section('content')


@include('session.success')
@include('session.error')

<div class="card">
	<div class="card-header">Createa a new option</div>
	<div class="card-body">
		<form action="{{ route('optional.store') }}" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="product">Select Product</label>
				<select name="product_id" id="product" class="form-control">
					
					@foreach($p as $a)
				  
				  	<option value="{{ $a->id }}">{{ $a->name }}</option>
				  	@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="name">Name Option</label>
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">Description</label>
				<input type="text" name="description" class="form-control">
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