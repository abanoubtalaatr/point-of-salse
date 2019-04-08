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
      <th scope="col">Arbic Name</th>
      <th scope="col">English Name</th>
      <th scope="col">Controll</th>
    </tr>
  </thead>
  <tbody>

  @foreach($all as $category)
    <tr>
      <th scope="row">{{ $category->id}}</th>
      <td>{{ $category->name_ar}}</td>
      <td>{{ $category->name_en}}</td>
    
    <td> 
      <a href="{{route("dashboard.category.delete_category",$category->id)}}" class="btn btn-danger">Delete</a>
    </td>
    </tr>
  @endforeach

  </tbody>
</table>
@stop

{{-- End section of content --}}