<div class="card">
	<div class="card-header">
		Category
	</div>
	<ul class="list-group list-group-flush">
		@if($category->count() > 0)
		@foreach($category as $c)
	    <li class="list-group-item dropright ">
	    
	    <a href="#">{{ $c->name }}</a>
	    <a href="" class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false""></a>
		    <div class="dropdown-menu" >
		    	@foreach($c->subcategory as $s)
		          <a class="dropdown-item" href="#">{{ $s->name }}</a>
		        @endforeach
	        </div>
		</li>
		@endforeach
		@else
		<li class="list-group-item dropright">No Category Yet
		</li>
		@endif
	    
	 </ul>
</div>