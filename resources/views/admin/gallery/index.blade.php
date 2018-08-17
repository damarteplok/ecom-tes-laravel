@extends('layouts.app')

@section('content')



			@include('session.success')
			@include('session.error')
			
			<div class="card">

				<div class="card-header">
					
					<span>Gallery Products</span>
					{{-- <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a> --}}

				</div>

				<div class="card-body">

					<table class="table table-striped">
					  
					  <thead>

					    <tr>
					      <th scope="col">Image</th>
					      <th scope="col">Name Product</th>
					      <th scope="col">Kode Product</th>
					      <th scope="col">View Gallery</th>
					      <th scope="col">Delete</th>
					    </tr>

					  </thead>
					  
					  <tbody>

					  	@if($products->count() > 0)

						  	@foreach($products as $p)
						    
						    <tr>

						    	<td><img src="{{ asset($p->image) }}" alt="{{ $p->name }}" width="90px" height="auto"></td>

						    	<td class="align-middle">{{ $p->name }}</td>
						    	<td class="align-middle">{{ $p->profile->kode_product }}</td>
							
						      	<td class="align-middle">
						      		
						      		<a href="{{ route('photo.index2', ['id' => $p->id]) }}" class="btn btn-info btn-sm">
						      			view
						      		</a>
						      	</td>

						      	<td class="align-middle">
						      		
						     

	                                <a href="{{ route('photo.destroy', ['id' => $p->id]) }}" class="btn btn-danger btn-sm">
						      			Delete
						      		</a>


						      	</td>



						    </tr>
						    
						    @endforeach

						    {!! $products->render() !!}

						@else

								<th colspan="6" class="text-center"> No Products</th>

						@endif
					      
					  </tbody>
					</table>

				</div>
			</div>





@stop