@extends('layouts.master')

@section('content')

@if(Auth::guard('customer')->check())

{{ Auth::shouldUse('customer') }}

<div class="card">
	<div class="card-header">
		Order Summary
	</div>
	<div class="card-body">
		<table class="table table-striped">
                      
              <thead>

                <tr>
                  
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  
                  <th scope="col" style="text-align: center;">Quantity</th>
                  
                  <th scope="col" style="text-align: center;">Total</th>
                  
                </tr>

              </thead>
              
              <tbody>

                @if(Cart::content()->count() > 0)

                    @foreach(Cart::content() as $p)
                    
                    <tr>
                       
                        
                        <td><img src="{{asset ($p->model->image) }}" alt="{{ $p->model->name }}" width="90px" height="auto"></td>
                        <td class="align-middle">{{ $p->model->price }}
                        </td>
                        
                       

                        <td class="align-middle" style="text-align: center;">{{ $p->qty }}
                        </td>

                       
                        
                        <td class="align-middle" style="text-align: center;">{{ $p->total() }}
                        </td>
                        


                    </tr>
                    
                    @endforeach

                    

                @else

                        <th colspan="4" class="text-center"> No Products</th>

                @endif
                  
              </tbody>
        </table>
        <br>
        <br>
        <br>
        <table class="table">
            <tr>
                
                <td class="w-25">Subtotal</td>
                <td class="w-25">{{ number_format(Cart::total()) }}</td>
            </tr>
            <tr>
                
                <td class="w-25">Total</td>
                <td class="w-25">{{number_format( Cart::total()) }}</td>
            </tr>
        </table>
	</div>
</div>

<div class="card">
	<div class="card-header">
		Delivery Address
	</div>
	<div class="card-body">
		{{ $b->alamat }}
	</div>
</div>

<div class="card">
	<div class="card-header">
		Pay with Stripe
	</div>
	<div class="card-body">
        <p>Stripe: The only limit to the maximum amount you can charge a customer is a technical one. The amount value supports up to eight digits (e.g., a value of 99999999 for a USD charge of $999,999.99).</p>
        <br>
        <p>4242 4242 4242 4242 (for test)</p>
		<form action="{{ route('customer.pay') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_hCvqvnLwANTRi3QqVBJsjzyZ"
            data-amount="{{ Cart::total() * 100 }}"
            data-name="Sumber-Rejeki"
            data-description="Charge"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
          </script>
        </form>
		
	</div>
</div>

@else

<script type="text/javascript">
    window.location = "{{ url('/customer/customer/login') }}";//here double curly bracket
</script>

@endif


@endsection