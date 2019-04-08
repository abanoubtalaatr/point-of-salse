@extends('dashboard.index')

@section('breadcrumb')
	<nav aria-label="breadcrumb " class="bread">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item active" aria-current="page">Home</li>
	    <li class="breadcrumb-item active" aria-current="page">Supervisor</li>
	    <li class="breadcrumb-item active" aria-current="page">Show All Client</li>
	    
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
		<a href="{{ route('dashboard.client.add')}}">
			 <button class="btn btn-primary"> <i class="fas fa-plus"></i> Add Client </button>
		</a>
	   
	</div>
 
@stop
{{-- End of search seach   --}}




{{-- Start section of content --}}
@section('content')
  <table class="table">
 
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">add order</th>
     
    </tr>
  </thead>
  <tbody>

  @foreach($all as $client)
    <tr>
      
      <td scope="row">{{ $client->name }}</td>
      <td scope="row">{{ $client->phone }}</td>
      <td scope="row">{{ $client->address }}</td>
     
       <td>
		    <a href="{{route("dashboard.order.add",$client->id)}}" class="btn btn-primary"> add order</a>
		  
      </td>
     
      
    </tr>
  @endforeach

  </tbody>
</table>
@stop

{{-- End section of content --}}