@extends('layouts.app')

@section('content')



			@include('session.success')
			@include('session.error')
			
			<div class="card">

				<div class="card-header">
					
					<span>Customer : {{ $customer->name }}</span>
					{{-- <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a> --}}

				</div>

				<div class="card-body">

					@if($order->count() > 0)

					<table class="table table-striped">


					  @foreach($order as $o)

					  <caption>Invoice : {{ $o->invoice_creation_date }}</caption>
					  
					  <thead>

					    <tr>
					      <th scope="col">Item/Desc</th>
					      <th scope="col">Qty</th>
					      <th scope="col">@</th>
					      <th scope="col">Price</th>
					      
					    </tr>

					  </thead>
					  
					  <tbody>

					  	@foreach($order->order_product as $ p)
						   
						    <tr>
						    	<td>{{ $p->product->name }}</td>
						    	<td>{{ $p->qty }}</td>
						    	

						      	<td>
						      		{{ $p->product->price }}
						      	</td>

						      	<td>
						      		Price
						        </td>



						    </tr>
						    
						@endforeach

						    <tr>
						    	<th colspan="3">Subtotal</th>
						    	<td>1231</td>
						    </tr>

						    <tr>
						    	<th colspan="2">Tax</th>
						    	<td>7%</td>
						    	<td>13213</td>
						    </tr>

						    <tr>
						    	<th colspan="3">Total</th>
						    	<td>1231</td>
						    </tr>

						
					      
					  </tbody>
					
					@endforeach
					 
					</table>
					
					@else
						<table>
							<th colspan="4" class="text-center"> No Products</th>
						</table>
								

					@endif

				</div>
			</div>





@stop

