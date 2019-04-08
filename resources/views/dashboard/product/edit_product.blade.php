@extends('dashboard.index')
@section('content')
<!-- general form elements -->
          <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">edit  Prodcut</h3>
            </div>
          

            <hr>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.product.update',$product->id)}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group title_father">
                  <label class="title_son"> Categoies</label>
                </div>
                <div class="contain">
                  <div class="form-group">
                   <select name="category_id" class="category">
                     
                      <option value="{{$category->id}}">{{ $category->name_en}}</option>
                       @foreach($all_category as $category)
                       <option value="{{$category->id}}">{{$category->name_en}}</option>
                       @endforeach 
                    
                   </select>

                  </div>
                </div> {{-- contain --}}
                

                <div class="form-group title_father">
                  <label class="title_son"> Arbic</label>
                </div>
                <div class="contain">

                  <div class="form-group">
                   
                    <input type="text" class="form-control" placeholder="Arbic Name" name="name_ar" value="{{$product->name_ar}}">
                  </div>


                <div class="form-group">
                  
                  <textarea type="text" class="form-control" placeholder="Description in Arbic" name="description_ar" >{{ 
                    $product->description_ar }}</textarea>
                  
                </div>
                </div>{{-- contain --}}



                <div class="form-group title_father">
                  <label class="title_son"> English</label>
                </div>
                <div class="contain">

                  <div class="form-group">
                   
                    <input type="text" class="form-control" placeholder="English Name" name="name_en" value="{{ $product->name_en }}">
                    
                  </div>


                <div class="form-group">
                  
                  <textarea type="text" class="form-control" placeholder="Description in English" name="description_en" >{{
                    $product->description_en }}</textarea>
                  
                </div>


                </div> {{-- contain --}}

                <div class="form-group title_father">
                  <label class="title_son"> Sale</label>
                </div>

                <div class="contain">
                  <div class="form-group">  
                    <input type="text" class="form-control"  placeholder="price of purchase" name="purchase_price" value="{{ $product->purchase_price }}">
                    
                  </div>

                  <div class="form-group">  
                   
                    <input type="text" class="form-control"  placeholder="price of sale" name="sale_price" value="{{ $product->sale_price }}">
                   
                  </div>
                 </div> {{-- contain --}}



                <div class="form-group title_father">
                  <label class="title_son"> Stock</label>
                </div>

                <div class="contain">
                  <div class="form-group">                   
                    <input type="text" class="form-control"  placeholder="Stock" name="stock" value="{{ $product->stock }}">
                    
                  </div>
                </div> {{-- contain --}}
                


              
         
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">update</button>
              </div>
            </form> {{-- End form  --}}
          </div>
          <!-- /.box -->

@stop