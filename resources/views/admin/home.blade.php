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
              
              <p class="card-text text-center">{{ $totalorder }}</p>
            </div>
         </div>

          <div class="card border-danger mb-3">
            <div class="card-header text-center">
                Total Not Paid
            </div>
            <div class="card-body">
              
              <p class="card-text text-center">{{ $totalnotpaid }}</p>
            </div>
          </div>

          <div class="card border-info mb-3">
            <div class="card-header text-center">
                Total Customer
            </div>
            <div class="card-body">
              
              <p class="card-text text-center">{{ $totalmember }}</p>
            </div>
          </div>

          <div class="card border-success mb-3">
            <div class="card-header text-center">
                Total Sales All
            </div>
            <div class="card-body">
              
              <p class="card-text text-center">$ {{ $totalsales }}</p>


            </div>
          </div>

          <div class="card border-success mb-3">
            <div class="card-header text-center">
                Total Sales Month
            </div>
            <div class="card-body">
              <p class="card-text text-center">$ {{ $totalbln }}</p>
            </div>
          </div>

          
        </div>
      

      <div class="row">
        <div class="chart-container" style="position: relative; height:40vh; width:80vw">
          <canvas id="myChart" ></canvas>
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

@stop

@section('scripts')


<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",],
        datasets: [{
            label: '# $',
            data: @json($perdayorder),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@stop
