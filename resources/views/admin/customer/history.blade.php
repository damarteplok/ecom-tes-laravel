@extends('layouts.app')

@section('content')



			@include('session.success')
			@include('session.error')
			
			<div class="card">

				<div class="card-header">
					
					<span>Customer : {{ $customer->name }} History</span>
					{{-- <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a> --}}

				</div>

				<div class="card-body">

					@if($order->count() > 0)

					


					  @foreach($order as $o)

					  <p>Invoice : {{ $o->invoice_creation_date }}</p>
					  	<br>
						<p>Delivery due date: {{ $o->delivery_due_date }}</p>
						<br>
						<p>
						Payment due date: {{ $o->payment_due_date }}
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
					  	@foreach($o->product as $p)
						   
						    <tr>
						    	<td>{{ $p->name }}</td>
						    	<td>{{ $p->pivot->quantity }}</td>
						    	

						      	<td>
						      		${{ $p->price }}
						      	</td>

						      	<td>
						      		@php
						      		
						      	    $qi = ($p->pivot->quantity) * ($p->price);
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

					@endforeach
					
					@else
						<table>
							<th colspan="4" class="text-center"> No Products</th>
						</table>
								

					@endif

				</div>
			</div>





@stop

