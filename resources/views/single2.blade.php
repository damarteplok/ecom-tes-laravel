@extends('layouts.master')

@section('content')

<div class="card mb-3">
	
	<div class="card-header text-center">
		{{ $p->name }}
	</div>

	<div class="card-body">
		<div class="row mb-5">
			<div class="col-6">
				<div class="card" style="max-width: 20rem;">
 
                    <img class="card-img-top" style="width: 20rem; height: 16rem;" src="{{ asset($p->image) }}" alt="Card image cap">
                    
                    
                </div>
			</div>

			<div class="col-6">
				<p>Kode Product : {{ $p->profile->kode_product }}</p>
				<p>Pabrik Product : {{ $p->profile->pabrik_product }}</p>
				<p>Brand : {{ $p->profile->brand }}</p>
				<p>Poin : {{ $p->profile->poin }}</p>

			<form action="{{ route('cart.add') }}" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="qty">qty :</label>
					<input type="text" name="qty" class="form-control">
				</div>

				<input type="hidden" name="id" value="{{ $p->id }}">

				<div class="form-group">
					<div class="">
						<button class="btn btn-primary btn-block" type="submit">add to cart</button>
					</div>
				</div>

			</form>


				
			</div>
		</div>

		<div>
						
			<ul class="nav nav-tabs" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" href="#describe" role="tab" data-toggle="tab">describe</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#spec" role="tab" data-toggle="tab">spesifikasi</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#img" role="tab" data-toggle="tab">image</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#review" role="tab" data-toggle="tab">review</a>
			  </li>
			  
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div role="tabpanel" class="tab-pane fade in active" id="describe">
			  	
				{!! $p->description !!}

			  </div>
			  <div role="tabpanel" class="tab-pane fade in active" id="spec">
			  	@if($p->optional->count() > 0)
			  	
					@foreach($p->optional as $o)
					<div class="row mb-3">
						<div class="col-2">
							{{ $o->name }} :
						</div>
						<div class="col-10">
							{{ $o->description }}
						</div>
					</div>
					@endforeach
				@else

				No Spec added

				@endif

			  </div>

			  <div role="tabpanel" class="tab-pane fade" id="img">
			  		<div class="card-column">
			  	
					@foreach($p->gallery as $o)

					<div class="card m-2" style="max-width: 16rem;">
 
                    <img class="card-img-top" style="width: 16rem; height: 12rem;" src="{{ asset($o->filename) }}" alt="Card image cap">
                    
                    
	                </div>

					@endforeach

					</div>

			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="review">
			  	@include('shared.disqus')
			  </div>
			  
			</div>

		</div>

	</div>

</div>




@endsection