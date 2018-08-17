@extends('layouts.app')

@section('content')



			@include('session.success')
			@include('session.error')
			
			<div class="card">

				<div class="card-header">
					
					<span>Photos</span>
					<a href="{{ route('photo.create', ['id' => $id]) }}" class="btn btn-outline-success btn-sm float-right">Add</a>

				</div>

				<div class="card-body">

					<table class="table table-striped">
					  
					  <thead>

					    <tr>
					      <th scope="col">Image</th>
					      
					      <th scope="col">Edit</th>
					      <th scope="col">Delete</th>
					    </tr>

					  </thead>
					  
					  <tbody>

					  	@if($photo->count() > 0)

						  	@foreach($photo->gallery as $p)
						    
						    <tr>
						    	<td><img src="{{ asset($p->filename) }}" alt="{{ $p->product_id }}" width="90px" height="auto"></td>
						    	
							
						      	<td class="align-middle">
						      		
						      		<a href="{{ route('photo.edit', ['id' => $p->id]) }}" class="btn btn-info btn-sm">
						      			edit
						      		</a>
						      	</td>

						      	<td class="align-middle">
						      		
						      		<a href="{{ route('photo.destroy2', ['id' => $p->id]) }}" class="btn btn-danger btn-sm">
						      			Delete
						      		</a>


						      	</td>



						    </tr>
						    
						    @endforeach

						   

						@else

								<th colspan="6" class="text-center"> No Photo</th>

						@endif
					      
					  </tbody>
					</table>

				</div>
			</div>





@stop