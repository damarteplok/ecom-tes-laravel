@extends('layouts.app')

@section('content')

@include('session.success')
@include('session.error')


<div class="card">
	
	<div class="card-header">
		
		<span>Order</span>
		

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Order</th>
	      <th scope="col">created_at</th>
	      <th scope="col">view</th>
	      {{-- <th scope="col">Delete</th> --}}
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($order->count() > 0)


	  	@foreach($order as $o)
	    
	    <tr>
	      <td>
	      	{{ $o->invoice_creation_date }}
	      </td>
	      <td>
	      	{{ $o->created_at->toDateString() }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('order.edit', ['id' => $o->id]) }}" class="btn btn-info btn-sm">
	      			View
	      		</a>

	      </td>

	      {{-- <td>

	      		<form action="{{ 
	                route('order.destroy', 
	                ['id' => $o->id]) 
	            }}" 
	            method="post">
	                {{ csrf_field() }}
	                {{ method_field('DELETE') }}
	                <button 
	                class="btn btn-sm btn-danger" 
	                type="submit">Delete</button>
	            </form>
	      		
	      		

	      </td> --}}

	    </tr>
	    
	    @endforeach
	    {!! $order->render() !!}
	    @else

	    	<th colspan="4" class="text-center"> No order</th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop