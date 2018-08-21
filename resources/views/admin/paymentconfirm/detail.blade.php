@extends('layouts.app')

@section('content')

@include('session.success')
@include('session.error')


<div class="card">
	
	<div class="card-header">
		
		<span>Detail : {{ $t->order_id }}</span>
		

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">OrderId</th>
	      <th scope="col">Account Name</th>
	      <th scope="col">Account NoHp</th>		
	      <th scope="col">Tgl</th>
		  <th scope="col">bank_receiver</th>
	      <th scope="col">from_bank</th>
	      <th scope="col">payment_amount</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($t->count() > 0)


	  	
	    
	    <tr>
	      <td>
	      	{{ $t->order_id }}
	      </td>
	      <td>
	      	{{ $t->account_name }}
	      </td>
	      <td>
	      	{{ $t->account_nohp }}
	      </td>
	      <td>
	      	{{ $t->created_at->toFormattedDateString() }}
	      </td>
	      <td>
	      	{{ $t->bank_receiver }}
	      </td>
	      <td>
	      	{{ $t->bank_form }}
	      </td>
	      <td>
	      	{{ $t->payment_amount }}
	      </td>
	      
	      
		
	      

	      

	    </tr>

	    <tr>
	    	<td colspan="7">&nbsp;</td>
	    </tr>
	    <tr>
	    	<td colspan="7">&nbsp;</td>
	    </tr>
	    
	    
	    <tr>
	    	<th colspan="6" align="center">Mark As</th>

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

	    </tr>

	    @else

	    	<th colspan="7" class="text-center"> No PaymentConfirm </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop