@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header text-center">
        {{ $cat->name }}
    </div>
    <div class="card-body">
    	
        @if($posts->count() > 0)
        
            <div class="card-columns">
                
                    
					@foreach($posts as $p)

                    <div class="card" style="max-width: 16rem;">
                        <a href="{{ route('product.single', ['id' => $p->id]) }}">
                        <img class="card-img-top" style="width: 13.4rem; height: 12rem;" src="{{ asset($p->image) }}" alt="Card image cap">
                        </a>
                        <div class="card-body text-center">
                            <a href="{{ route('product.single', ['id' => $p->id]) }}">
                            <h5 class="card-title" >
                                {{ $p->name }}
                            </h5>
                            </a>
                            <p class="card-text" style="color: #900">
                                
                                ${{ $p->price }}
                            </p>

                            @if($p->status == 1)

                            <p class="card-text text-muted">
                                
                                In Stock
                            </p>
                            @elseif($p->status == 0)

                            <p class="card-text text-muted">
                                
                                Out Of Stock
                            </p>

                            @else 

                            <p class="card-text text-muted">
                                
                                Pre Order
                            </p>

                            @endif


                        </div>
                        <div class="card-footer text-left">
                             <a href="{{ route('cart.rapid.add', ['id' => $p->id]) }}" class="btn btn-primary btn-sm">Add To Cart</a>
                        </div>
                    </div>
                    
                    @endforeach
                
            </div>
            <div class="d-flex justify-content-center mt-3">
               {{$posts->links()}}


            </div>
            
        @else
        <h5>No Post Yet</h5>
        @endif
    </div>
</div>



@endsection