@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
         <div class="card-deck">
          <div class="card border-info mb-3">
            <div class="card-header text-center">
                Total Orders
            </div>
            <div class="card-body">
              
              <p class="card-text text-center">{{-- {{ $post_count }} --}}1111</p>
            </div>
         </div>

          <div class="card border-danger mb-3">
            <div class="card-header text-center">
                Total Refund
            </div>
            <div class="card-body">
              
              <p class="card-text text-center">1111</p>
            </div>
          </div>

          <div class="card border-info mb-3">
            <div class="card-header text-center">
                Total Member 
            </div>
            <div class="card-body">
              
              <p class="card-text text-center">1111</p>
            </div>
          </div>

          <div class="card border-success mb-3">
            <div class="card-header text-center">
                Total Sales
            </div>
            <div class="card-body">
              
              <p class="card-text text-center">1111</p>
            </div>
          </div>

    </div>
</div>

  

  {{-- <div class="card border-warning mb-3">
    <div class="card-header text-center">
        PRODUCTS
    </div>
    <div class="card-body">
      
      <p class="card-text text-center">{{ $product_count }}</p>
    </div>
  </div>

  <div class="card border-success mb-3">
    <div class="card-header text-center">
        PAID
    </div>
    <div class="card-body">
      
      <p class="card-text text-center">{{ $paid_count }}</p>
      <p class="card-text text-center">sum month income : {{ $sum1_paid }}</p>
      <p class="card-text text-center">sum total income : {{ $sum_paid }}</p>
    </div>
  </div>

  <div class="card border-primary mb-3">
    <div class="card-header text-center">
        BOOKED
    </div>
    <div class="card-body">
      
      <p class="card-text text-center">{{ $book_count }}</p>
    </div>
  </div> --}}
  
  
</div>
@endsection
