@extends('layouts.app')
@section('content')


@include('session.success')
@include('session.error')

<div class="card">
	<div class="card-header">Update customer : {{ $customer->name }}</div>
	<div class="card-body">
		<form action="{{ route('customer.update',['id' => $customer->id]) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" value="{{ $customer->name }}" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">Alamat</label>
				<input type="text" value="{{ $customer->alamat }}" name="alamat" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">Nohp</label>
				<input type="text" value="{{ $customer->nohp }}" name="nohp" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">email</label>
				<input type="email" value="{{ $customer->email }}" name="email" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">update customer</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop