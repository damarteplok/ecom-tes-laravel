@extends('layouts.master')

@section('content')

@if(Auth::guard('customer')->check())

                {{ Auth::shouldUse('customer') }}

<div class="card">
	<div class="card-header">
		Order Summary
	</div>
	<div class="card-body">
		
	</div>
</div>

<div class="card">
	<div class="card-header">
		Delivery Address
	</div>
	<div class="card-body">
		
	</div>
</div>

<div class="card">
	<div class="card-header">
		Pay with
	</div>
	<div class="card-body">
		
	</div>
</div>

@else

<script type="text/javascript">
    window.location = "{{ url('/customer/customer/login') }}";//here double curly bracket
</script>

@endif


@endsection