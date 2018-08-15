@extends('layouts.app')
@section('content')


@include('session.success')
@include('session.error')

<div class="card">
	<div class="card-header">Update category : {{ $p->name }}</div>
	<div class="card-body">
		<form action="{{ route('optional.update',['id' => $p->id]) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="form-group">
				<label for="name">Name Option</label>
				<input type="text" value="{{ $p->name }}" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="product">Select product</label>
				<select name="product_id" id="product_id" class="form-control">
					
					@foreach($s as $a)
				  
				  	<option value="{{ $a->id }}"
				  		
						@if($p->product_id == $a->id)
								selected
						@endif
						

				  		>{{ $a->name }}</option>
				  	@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="des">Description</label>
				<input type="text" value="{{ $p->description }}" name="description" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">update option</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop