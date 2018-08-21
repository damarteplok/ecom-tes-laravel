@extends('layouts.app')

@section('content')

@include('session.success')
@include('session.error')


<div class="card">
	
	<div class="card-header">
		
		<span>PaymentConfirm</span>
		

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">OrderId</th>		
	      <th scope="col">Tgl</th>
	      <th scope="col">Detail</th>
	      <th scope="col">Paid/Not</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($p->count() > 0)


	  	@foreach($p as $t)
	    
	    <tr>
	      <td>
	      	{{ $t->order_id }}
	      </td>
	      <td>
	      	{{ $t->created_at->toFormattedDateString() }}
	      </td>
	      
	      <td>
	      		
	      		<a href="{{ route('payment.detail', ['id' => $t->id]) }}" class="btn btn-info btn-sm">
	      			View
	      		</a>

	      </td>
		
	      <td>
	    		@if($t->status == 0)  		
	      		<a href="{{ route('payment.change', ['id' => $t->id]) }}" class="btn btn-danger btn-sm">
	      			notpaid
	      		</a>
				@else
	      		<a href="{{ route('payment.change', ['id' => $t->id]) }}" class="btn btn-success btn-sm">
	      			paid
	      		</a>
	      		@endif

	      </td>

	      <td>
				<a href="{{ route('payment.destroy', ['id' => $t->id]) }}" class="btn btn-danger btn-sm">Delete</a>
	      			

	      </td>

	    </tr>
	    
	    @endforeach
	    {!! $p->render() !!}
	    @else

	    	<th colspan="5" class="text-center"> No PaymentConfirm </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop