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
      <th scope="col">name in arabic </th>
      <th scope="col">description arabic</th>
      <th scope="col">english name</th>
      <th scope="col">description arabic</th>
      <th scope="col">purchase price</th>
      <th scope="col">sale price</th>
      <th scope="col">stock</th>
      <th scope="col">controller</th>
    </tr>
  </thead>
  <tbody>

  @foreach($all as $product)
    <tr>
      <th scope="row">{{ $product->name_ar }}</th>
      <th scope="row">{{ $product->description_ar }}</th>
      <th scope="row">{{ $product->name_en }}</th>
      <th scope="row">{{ $product->description_en }}</th>
      <th scope="row">{{ $product->purchase_price }}</th>
      <th scope="row">{{ $product->sale_price }}</th>
      <th scope="row">{{ $product->stock }}</th>
    
    <td> 
      <a href="{{route("dashboard.product.delete_product",$product->id)}}" class="btn btn-danger">Delete</a>
    </td>
    </tr>
  @endforeach

  </tbody>
</table>
@stop

{{-- End section of content --}}