@extends('layouts.app')

@section('content')



			@include('session.success')
			@include('session.error')
			
			<div class="card">

				<div class="card-header">
					
					<span>Customer</span>
					{{-- <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a> --}}

				</div>

				<div class="card-body">

					<table class="table table-striped">
					  
					  <thead>

					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Joined_at</th>
					      <th scope="col">View</th>
					      <th scope="col">Edit</th>
					      <th scope="col">Delete</th>
					    </tr>

					  </thead>
					  
					  <tbody>

					  	@if($customer->count() > 0)

						  	@foreach($customer as $p)
						    
						    <tr>
						    	<td class="align-middle">{{ $p->name }}</td>
						    	<td class="align-middle">{{ $p->created_at }}</td>
						    	

						      	<td class="align-middle">
						      		
						      		<a href="{{ route('customer.view', ['id' => $p->id]) }}" class="btn btn-success btn-sm">
						      			History
						      		</a>
						      	</td>

						      	<td class="align-middle">
						      		
						      		<a href="{{ route('customer.edit', ['id' => $p->id]) }}" class="btn btn-info btn-sm">
						      			Edit
						      		</a>
						      	</td>

						      	<td class="align-middle">
						      		
						      		<form action="{{ 
		                                route('customer.destroy', 
		                                ['id' => $p->id]) 
		                            }}" 
	                                method="post">
	                                    {{ csrf_field() }}
	                                    {{ method_field('DELETE') }}
	                                    <button 
	                                    class="btn btn-sm btn-danger" 
	                                    type="submit">Destroy</button>
	                                </form>


						      	</td>



						    </tr>
						    
						    @endforeach

						    {!! $customer->render() !!}

						@else

								<th colspan="7" class="text-center"> No Products</th>

						@endif
					      
					  </tbody>
					</table>

				</div>
			</div>





@stop