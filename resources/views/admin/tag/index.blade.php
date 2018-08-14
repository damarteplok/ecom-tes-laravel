@extends('layouts.app')

@section('content')

@include('session.success')
@include('session.error')


<div class="card">
	
	<div class="card-header">
		
		<span>Tag</span>
		<a href="{{ route('tag.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a>

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Tag Name</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($tag->count() > 0)


	  	@foreach($tag as $t)
	    
	    <tr>
	      <td>
	      	{{ $t->tag }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('tag.edit', ['id' => $t->id]) }}" class="btn btn-info btn-sm">
	      			Edit
	      		</a>

	      </td>

	      <td>

	      		<form action="{{ 
	                route('tag.destroy', 
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
	    {!! $tag->render() !!}
	    @else

	    	<th colspan="5" class="text-center"> No tag </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop