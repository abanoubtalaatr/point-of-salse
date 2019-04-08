@extends('dashboard.index')


@section('breadcrumb')
	<nav aria-label="breadcrumb " class="bread">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item active" aria-current="page">Home</li>
	    <li class="breadcrumb-item active" aria-current="page">Supervisor</li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	    
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
		<a href="{{ route('dashboard.admin.add')}}">
			 <button class="btn btn-primary"> <i class="fas fa-plus"></i> Add Admin </button>
		</a>
	   
	</div>
 
@stop
{{-- End of search seach   --}}



{{-- Start section of content --}}
@section('content')
  <table class="table">
 
  <thead>
    <tr>
     <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Mid Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Position</th>
    </tr>
  </thead>
  <tbody>

  @foreach($all as $user)
    <tr>
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->firstname}}</td>
      <td>{{ $user->midname}}</td>
      <td>{{ $user->lastname}} </td>
      <td>{{ $user->email}} </td>
      <td>
		    <a href="{{route("dashboard.admin.edit_single",$user->id)}}" class="btn btn-primary">Edit</a>
		  
        </td>
    </tr>
  @endforeach

  </tbody>
</table>
@stop

{{-- End section of content --}}