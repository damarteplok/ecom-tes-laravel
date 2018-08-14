@extends('layouts.app')

@section('content')

@include('session.success')
@include('session.error')


<div class="card">
	
	<div class="card-header">
		
		<span>Optional</span>
		<a href="{{ route('optional.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a>

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Optional Name</th>
	      <th scope="col">Description</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($p->count() > 0)


	  	@foreach($p as $t)
	    
	    <tr>
	      <td>
	      	{{ $t->name }}
	      </td>

	      <td>
	      	{{ $t->description }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('optional.edit', ['id' => $t->id]) }}" class="btn btn-info btn-sm">
	      			Edit
	      		</a>

	      </td>

	      <td>

	      		<form action="{{ 
	                route('optional.destroy', 
	                ['id' => $t->id]) 
	            }}" 
	            method="post">
	                {{ csrf_field() }}
	                {{ method_field('DELETE') }}
	                <button 
	                class="btn btn-sm btn-danger" 
	                type="submit">Delete</button>
	            </form>
	      		
	      		

	      </td>

	    </tr>
	    
	    @endforeach
	    {!! $p->render() !!}
	    @else

	    	<th colspan="5" class="text-center"> No Optional </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop