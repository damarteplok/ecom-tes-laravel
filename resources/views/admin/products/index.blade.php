@extends('layouts.app')

@section('content')



			@include('session.success')
			@include('session.error')
			
			<div class="card">

				<div class="card-header">
					
					<span>Products</span>
					<a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a>

				</div>

				<div class="card-body">

					<table class="table table-striped">
					  
					  <thead>

					    <tr>
					      <th scope="col">Image</th>
					      <th scope="col">Name</th>
					      <th scope="col">Kode</th>
					      <th scope="col">Price</th>
					      <th scope="col">Stock</th>
					      <th scope="col">Edit</th>
					      <th scope="col">Delete</th>
					    </tr>

					  </thead>
					  
					  <tbody>

					  	@if($products->count() > 0)

						  	@foreach($products as $p)
						    
						    <tr>
						    	<td><img src="{{ $p->image }}" alt="{{ $p->name }}" width="90px" height="auto"></td>
						    	<td class="align-middle">{{ $p->name }}</td>
						    	<td class="align-middle">{{ $p->profile->kode_product }}</td>
						    	<td class="align-middle">{{ $p->price }}</td>

								@if($p->status == 0)


						    	<td class="align-middle">Out Of Stock</td>

						    	@elseif($p->status == 1)
						      
						      	<td class="align-middle">In Stock</td>

						      	@else

						      	<td class="align-middle">Pre Order</td>

						      	@endif

						      	<td class="align-middle">
						      		
						      		<a href="{{ route('products.edit', ['id' => $p->id]) }}" class="btn btn-info btn-sm">
						      			edit
						      		</a>
						      	</td>

						      	<td class="align-middle">
						      		
						      		<form action="{{ 
		                                route('products.destroy', 
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

						    {!! $products->render() !!}

						@else

								<th colspan="7" class="text-center"> No Products</th>

						@endif
					      
					  </tbody>
					</table>

				</div>
			</div>





@stop