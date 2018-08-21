@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header text-center">
        Cart
    </div>
    <div class="card-body">
        

        <table class="table table-striped">
                      
              <thead>

                <tr>
                  <th scope="col">&nbsp;</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">&nbsp;</th>
                  <th scope="col" style="text-align: center;">Quantity</th>
                  <th scope="col">&nbsp;</th>
                  <th scope="col" style="text-align: center;">Total</th>
                  
                </tr>

              </thead>
              
              <tbody>

                @if(Cart::content()->count() > 0)

                    @foreach(Cart::content() as $p)
                    
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('cart.delete', ['id' => $p->rowId]) }}" class="btn btn-outline-danger btn-sm">x</a>
                        </td>
                        
                        <td><img src="{{asset ($p->model->image) }}" alt="{{ $p->model->name }}" width="90px" height="auto"></td>
                        <td class="align-middle">{{ $p->model->price }}
                        </td>
                        
                        <td class="align-middle">
                            <a href="{{ route('cart.decr', ['id' => $p->rowId, 'qty' => $p->qty]) }}" class="btn btn-outline-success btn-sm">-</a>
                        </td>

                        <td class="align-middle" style="text-align: center;">{{ $p->qty }}
                        </td>

                        <td class="align-middle">
                            <a href="{{ route('cart.incr', ['id' => $p->rowId, 'qty' => $p->qty]) }}" class="btn btn-outline-success btn-sm">+</a>
                        </td>
                        
                        <td class="align-middle" style="text-align: center;">{{ $p->total() }}
                        </td>
                        


                    </tr>
                    
                    @endforeach

                    

                @else

                        <th colspan="7" class="text-center"> No Products</th>

                @endif
                  
              </tbody>
        </table>
        <br>
        <br>
        <br>
        <table class="table">
            <tr>
                <th colspan="5">&nbsp;</th>
                <td class="w-25">Subtotal</td>
                <td class="w-25">{{ Cart::total() }}</td>
            </tr>
            <tr>
                <th colspan="5">&nbsp;</th>
                <td class="w-25">Total</td>
                <td class="w-25">{{ Cart::total() }}</td>
            </tr>
        </table>
        <br>
        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('index') }}" class="btn btn-outline-info">back shopping</a>
            </div>

            <div>
                <a href="{{ route('customer.checkout') }}" class="btn btn-success">checkout</a>
            </div>
        </div>
    </div>   
</div>



@endsection