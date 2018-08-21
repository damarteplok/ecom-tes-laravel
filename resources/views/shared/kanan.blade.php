<div class="card">
	<div class="card-header">
		@if(Cart::total() == 0)
		Shopping Cart
		@else
		
		Shopping Cart : {{ Cart::content()->count() }}
		<br>
		
		<a href="{{ route('cart') }}"><p style="display: inline">view cart</p>
		</a>
		
		
		@endif
	</div>
	<div class="card-body px-1 text-muted">
		 
		 <ul class="list-group list-group-flush">
		 	@foreach(Cart::content() as $pdt)
		    <li class="list-group-item px-0" style="font-size: 12px">
				<a href="{{ route('cart.delete', ['id' => $pdt->rowId]) }}" class="btn btn-outline-danger btn-sm">x</a>
		    	{{ $pdt->qty }} x {{ $pdt->name }}</li>
		    @endforeach
		  </ul>
		
	</div>
	<div class="card-footer text-center" style="color: #900">
		@if(Cart::total() == 0)

		@else
		idr {{ Cart::total() }}
		<a href="{{ route('customer.checkout') }}"><p style="display: inline">checkout</p>
		</a>
		@endif
	</div>
</div>


<div class="card my-3">
	<div class="card-header">
		Information
	</div>
	<div class="card-body">
		 
		 <ul class="list-group list-group-flush">
		 	
		    <li class="list-group-item px-0">
				<a href="{{ route('about') }}">About Us</a>
		    </li>
		    <li class="list-group-item px-0">
				<a href="{{ route('faq') }}">FAQ</a>
		    </li>
		    <li class="list-group-item px-0">
				<a href="{{ route('term') }}">Term n Conditions</a>
		    </li>
		    <li class="list-group-item px-0">
				<a href="{{ route('howto') }}">How To Buy</a>
		    </li>
		    <li class="list-group-item px-0">
				<a href="{{ route('policy') }}">Privacy Policy</a>
		    </li>
		    <li class="list-group-item px-0">
				<a href="{{ route('contact') }}">Contact Us</a>
		    </li>
		    
		  </ul>
		
	</div>
	
</div>