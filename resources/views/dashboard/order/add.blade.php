@extends('dashboard.index')
@section('content')
  <!-- general form elements -->
  <div class="box box-primary box_order ">
      <div class="right col-md-6">
        <div class="row col-md-12">
          <h4>category</h4>

          <div class="list-group col-md-12" id="myList" role="tablist">
             
           @foreach($category as $key => $cat)
              
              <a class="list-group-item list-group-item-action" data-toggle="list" href="#{{str_replace(' ', '', $cat->name_en)}}" role="tab">{{$cat->name_en}}</a>

            <div class="{{$cat->name_en}}">
              <table class="table">
              <thead>
                 <th scope="col"> Name </th>
                 <th scope="col"> stock</th>
                 <th scope="col"> price</th>
                 <th scope="col"> add </th>
              </thead>
              @foreach($products as $key => $value)
                @foreach($value as $va)
                  @if($va->category_id == $cat->id)
                       
                   <tbody>
                     <td> {{ $va->name_en}}</td>
                     <td> {{ $va->stock}}</td>
                     <td> {{ $va->sale_price}}</td>
                     <td> <button class="btn btn-primary" id="{{$va->id}}"><i class="fas fa-plus"></i></button></td>
                   </tbody>
                 
                  @endif
                @endforeach
               @endforeach
               </table>
             </div>
            @endforeach
       
           </div> {{-- End list-group --}}

         </div> {{-- End col-md-12 --}}

      </div> {{-- right --}}

      <div class="left col-md-6">
        <h4> orders for this person</h4>
        <table class="table">
           <thead>
             <th> delete</th>
             <th> product</th>
             <th> amount</th>
             <th> price</th>
           </thead>
           <tbody id="tbody">
           
{{--         <td>
               <div class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </div>
             </td>
             <td></td>
             <td>
               
             </td>
             <td>
               <input type="number" name="" min="1">
             </td> --}}
           </tbody>
        </table>
      </div>
  
    <!-- /.box-header -->
    <!-- form start -->
   
      <form role="form" action="{{ route('dashboard.order.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
      
       {{--  <div class="box-footer">
          <button type="submit" class="btn btn-primary">add</button>
        </div> --}}
        </div>   {{-- box-body --}}   
      </form> {{-- End form  --}}
  
   
  </div>
  <!-- /.box -->

@stop 
