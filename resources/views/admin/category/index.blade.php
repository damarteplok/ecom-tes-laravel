@extends('layouts.app')

@section('content')

@include('session.success')
@include('session.error')


<div class="card">
	
	<div class="card-header">
		
		<span>Category</span>
		<a href="{{ route('category.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a>

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Category Name</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($categories->count() > 0)


	  	@foreach($categories as $category)
	    
	    <tr>
	      <td>
	      	{{ $category->name }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm">
	      			Edit
	      		</a>

	      </td>

	      <td>

	      		<form action="{{ 
	                route('category.destroy', 
	                ['id' => $category->id]) 
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
	    {!! $categories->render() !!}
	    @else

	    	<th colspan="5" class="text-center"> No category </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop