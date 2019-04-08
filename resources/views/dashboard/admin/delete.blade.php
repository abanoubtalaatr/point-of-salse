@extends('dashboard.index')

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
      <th scope="col">Controll</th>
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
      	@if($user->level =='1')
      	  {{ 'Super Admin'}}
      	@endif
      	@if($user->level =='2')
      	  {{ 'Admin'}}
      	@endif
      	@if($user->level =='3')
      	  {{ 'Boss Supervisor'}}
      	@endif
      	@if($user->level =='4')
      	  {{ 'Supervisor'}}
      	@endif

    </td>
    <td> 
      <a href="{{route("dashboard.admin.delete_admin",$user->id)}}" class="btn btn-danger">Delete</a>
    </td>
    </tr>
  @endforeach

  </tbody>
</table>
@stop

{{-- End section of content --}}