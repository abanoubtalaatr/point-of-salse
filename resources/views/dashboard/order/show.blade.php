@extends('dashboard.index')

@section('breadcrumb')
	<nav aria-label="breadcrumb " class="bread">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item active" aria-current="page">Home</li>
	    <li class="breadcrumb-item active" aria-current="page">Supervisor</li>
	    <li class="breadcrumb-item active" aria-current="page">add order</li>
	    
	  </ol>
	</nav>
@stop


{{-- Start of search section  --}}
@section('search')

	<div class="col-md-4 float-left">

	   	  <form action="/search" method="POST" role="search">
		      {{ csrf_field() }}
			    <div class="input-group">
			        <input type="text" class="form-control" name="q"
			            placeholder="Search users"> 
			            <button type="submit" class="btn btn-primary ml-1">
			                search 
			            </button>
			        
			    </div>
	     </form>  {{-- End form --}}
    </div>

	<div class="col-md-4 float-left">
		<a href="{{ route('dashboard.order.add')}}">
			 <button class="btn btn-primary"> <i class="fas fa-plus"></i> Add Order </button>
		</a>
	   
	</div>
 
@stop
{{-- End of search seach   --}}




{{-- Start section of content --}}
@section('content')
  <table class="table">
 
  <thead>
    <tr>
      
     
    </tr>
  </thead>
  <tbody>



  </tbody>
</table>
@stop

{{-- End section of content --}}