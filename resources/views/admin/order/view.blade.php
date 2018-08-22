@extends('layouts.app')

@section('content')



			@include('session.success')
			@include('session.error')
			
			<div class="card">

				<div class="card-header">
					
					<span>Order View</span>
					{{-- <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a> --}}

				</div>

				<div class="card-body">

					@if($p->count() > 0)

					


					  

					  <p>Invoice : {{ $order->invoice_creation_date }}</p>
					  	<br>
						<p>Delivery due date: {{ $order->delivery_due_date }}</p>
						<br>
						<p>
						Payment due date: {{ $order->payment_due_date }}
						</p>
					  
					 
					<table class="table table-striped">

					  <thead>

					    <tr>
					      <th scope="col">Item/Desc</th>
					      <th scope="col">Qty</th>
					      <th scope="col">@</th>
					      <th scope="col">Total</th>
					    </tr>

					  </thead>
					  
					  <tbody>
						@php
						$aa = 0;
						@endphp
					  	@foreach($p as $o)
						   
						    <tr>
						    	<td>{{ $o->name }}</td>
						    	<td>{{ $o->pivot->quantity }}</td>
						    	

						      	<td>
						      		${{ $o->price }}
						      	</td>

						      	<td>
						      		@php
						      		
						      	    $qi = ($o->pivot->quantity) * ($o->price);
						      		$aa = $qi + $aa;
						      		@endphp
						      		$ {{ $qi }}
						        </td>


						    </tr>
						    
						@endforeach

						    <tr>
						    	<th colspan="3">Subtotal</th>
						    	<td>$ {{ $aa }}</td>
						    </tr>

						    <tr>
						    	<th colspan="2">Tax</th>
						    	<td>0%</td>
						    	<td>$ {{ $aa }}</td>
						    </tr>

						    <tr>
						    	<th colspan="3">Total</th>
						    	<td><strong>$ {{ $aa }}</strong>	 </td>
						    </tr>

						
					      
					  </tbody>
					
					
					 
					</table>
					<hr>
					<br>
					
					@else
						<table>
							<th colspan="4" class="text-center"> No Order</th>
						</table>
								

					@endif

				</div>
			</div>





@stop

