@if(Session::has('success'))
               
<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
  {{ Session::get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

@if(Session::has('info'))

<div class="alert alert-info alert-dismissible fade show mb-2" role="alert">
  {{ Session::get('info') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif