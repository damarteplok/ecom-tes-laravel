{{-- @extends('layouts.front')

@section('page')

<div class="container">
    <div class="row pt120">
        <div class="books-grid">

        <div class="row mb30">

            @foreach($products as $p)

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="books-item">
                    <a href="{{ route('product.single', ['id' => $p->id]) }}">
                    <div class="books-item-thumb">
                        
                        <img src="{{asset($p->image)}}" alt="book">

                        <div class="new">New</div>
                        <div class="sale">Sale</div>
                        <div class="overlay overlay-books"></div>
                    </div>
                    </a>

                    <div class="books-item-info">
                        <a href="{{ route('product.single', ['id' => $p->id]) }}">
                            <h5 class="books-title">{{ $p->name }}</h5>
                        </a>
                        

                        <div class="books-price">${{ $p->price }}</div>
                    </div>

                    <a href="{{ route('cart.rapid.add', ['id' => $p->id]) }}" class="btn btn-small btn--dark add">
                        <span class="text">Add to Cart</span>
                        <i class="seoicon-commerce"></i>
                    </a>

                </div>
            </div>

            @endforeach
        </div>

        <div class="row pb120">

            <div class="col-lg-12">
                {{ $products->links() }}
            </div> --}}

            {{-- <div class="col-lg-12">

                <nav class="navigation align-center">

                    <a href="#" class="page-numbers bg-border-color current"><span>1</span></a>
                    <a href="#" class="page-numbers bg-border-color"><span>2</span></a>
                    <a href="#" class="page-numbers bg-border-color"><span>3</span></a>
                    <a href="#" class="page-numbers bg-border-color"><span>4</span></a>
                    <a href="#" class="page-numbers bg-border-color"><span>5</span></a>

                    <svg class="btn-prev">
                        <use xlink:href="#arrow-left"></use>
                    </svg>
                    <svg class="btn-next">
                        <use xlink:href="#arrow-right"></use>
                    </svg>

                </nav>

            </div> --}}

{{--         </div>
    </div>
    </div>
</div>

@endsection --}}

@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header text-center">
        New Release
    </div>
    <div class="card-body">
        @if($tag->count() > 0)
            <div class="card-deck">
                
                    @foreach($tag as $t)
                    <div class="card">
                        <a href="{{ route('product.single', ['id' => $t->id]) }}">
                        <img class="card-img-top" style="width: 13rem; height: 12rem;" src="{{ asset($t->image) }}" alt="Card image cap">
                        </a>
                        <div class="card-body text-center">
                            <a href="{{ route('product.single', ['id' => $t->id]) }}">
                            <h5 class="card-title" >
                                {{ $t->name }}
                            </h5>
                            </a>
                            <p class="card-text" style="color: #900">
                                
                                idr-{{ $t->price }}
                            </p>

                            @if($t->status == 1)

                            <p class="card-text text-muted">
                                
                                In Stock
                            </p>
                            @elseif($t->status == 0)

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
                             <a href="{{ route('cart.rapid.add', ['id' => $t->id]) }}" class="btn btn-primary btn-sm">Add To Cart</a>
                        </div>
                    </div>
                    @endforeach
                
            </div>
            <div class="d-flex justify-content-center mt-3">
                
                {{$tag->appends(['p1' => $tag->currentPage()])->links()}}
                
                {{-- {!! $tag->render() !!} --}}    
            </div>
            
        @else
        <h5>No Post Yet</h5>
        @endif
    </div>
</div>

<div class="card my-3">
    <div class="card-header text-center">
        Hot Deal
    </div>
    <div class="card-body">
        @if($tag2->count() > 0)
            <div class="card-deck">
                
                    @foreach($tag2 as $t)
                    
                    <div class="card">
                        <a href="{{ route('product.single', ['id' => $t->id]) }}">
                        <img class="card-img-top" src="{{ asset($t->image) }}" alt="Card image cap">
                        </a>
                        <div class="card-body text-center">
                            <a href="{{ route('product.single', ['id' => $t->id]) }}">
                            <h5 class="card-title" >
                                {{ $t->name }}
                            </h5>
                            </a>
                            <p class="card-text" style="color: #900">
                                
                                idr-{{ $t->price }}
                            </p>

                            @if($t->status == 1)

                            <p class="card-text text-muted">
                                
                                In Stock
                            </p>
                            @elseif($t->status == 0)

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
                             <a href="{{ route('cart.rapid.add', ['id' => $t->id]) }}" class="btn btn-primary btn-sm">Add To Cart</a>
                        </div>
                    </div>
                    
                    @endforeach
                
            </div>
            <div class="d-flex justify-content-center mt-3">
               {{--  {!! $tag2->render() !!}   --}}

               {{$tag2->appends(['p2' => $tag2->currentPage()])->links()}}  
            </div>
            
        @else
        <h5>No Post Yet</h5>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-header text-center">
        Lastest
    </div>
    <div class="card-body">
        @if($product->count() > 0)
            <div class="card-columns">
                
                    @foreach($product as $t)
                    
                    <div class="card" style="max-width: 16rem;">
                        <a href="{{ route('product.single', ['id' => $t->id]) }}">
                        <img class="card-img-top" style="width: 13.4rem; height: 12rem;" src="{{ asset($t->image) }}" alt="Card image cap">
                        </a>
                        <div class="card-body text-center">
                            <a href="{{ route('product.single', ['id' => $t->id]) }}">
                            <h5 class="card-title" >
                                {{ $t->name }}
                            </h5>
                            </a>
                            <p class="card-text" style="color: #900">
                                
                                idr-{{ $t->price }}
                            </p>

                            @if($t->status == 1)

                            <p class="card-text text-muted">
                                
                                In Stock
                            </p>
                            @elseif($t->status == 0)

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
                             <a href="{{ route('cart.rapid.add', ['id' => $t->id]) }}" class="btn btn-primary btn-sm">Add To Cart</a>
                        </div>
                    </div>
                    
                    @endforeach
                
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{-- {!! $product->render() !!}  --}}

                {{$product->appends(['p3' => $product->currentPage()])->links()}}   
            </div>
            
        @else
        <h5>No Post Yet</h5>
        @endif
    </div>
</div>

@endsection