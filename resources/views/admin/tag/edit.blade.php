@extends('layouts.app')
@section('content')


@include('session.success')
@include('session.error')

<div class="card">
	<div class="card-header">Update Tag : {{ $tag->tag }}</div>
	<div class="card-body">
		<form action="{{ route('tag.update',['id' => $tag->id]) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" value="{{ $tag->tag }}" name="tag" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">update tag</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop