@extends('layouts.app')
@section('content')


@include('session.success')
@include('session.error')

<div class="card">
	<div class="card-header">Update category : {{ $category->name }}</div>
	<div class="card-body">
		<form action="{{ route('category.update',['id' => $category->id]) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" value="{{ $category->name }}" name="name" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">update category</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop