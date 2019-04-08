@extends('dashboard.index')
@section('content')
@section('content')
  <!-- general form elements -->
          <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Prodcut</h3>
            </div>
          

            <hr>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.product.store')}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group title_father">
                  <label class="title_son"> Categoies</label>
                </div>
                <div class="contain">
                  <div class="form-group">
                   <select name="category" class="category">
                    
                     @foreach($categories as $category)
                       <option value="{{$category->id}}">{{ $category->name_en }}</option>
                     @endforeach
                   </select>

                    @if($errors->has('category'))
                      <div class="alert alert-danger">{{$errors->first('category')}}</div>
                    @endif
                  </div>
                </div> {{-- contain --}}
                

                <div class="form-group title_father">
                  <label class="title_son"> Arbic</label>
                </div>
                <div class="contain">

                  <div class="form-group">
                   
                    <input type="text" class="form-control" placeholder="Arbic Name" name="name_ar" value="{{ old('name_ar') }}">
                    @if($errors->has('name_ar'))
                      <div class="alert alert-danger">{{$errors->first('name_ar')}}</div>
                    @endif
                  </div>


                <div class="form-group">
                  
                  <textarea type="text" class="form-control" placeholder="Description in Arbic" name="description_ar" value="{{ old('description_ar') }}"></textarea>
                  @if($errors->has('description_ar'))
                    <div class="alert alert-danger">{{$errors->first('description_ar')}}</div>
                  @endif
                </div>
                </div>{{-- contain --}}



                <div class="form-group title_father">
                  <label class="title_son"> English</label>
                </div>
                <div class="contain">

                  <div class="form-group">
                   
                    <input type="text" class="form-control" placeholder="English Name" name="name_en" value="{{ old('name_en') }}">
                    @if($errors->has('name_en'))
                      <div class="alert alert-danger">{{$errors->first('name_en')}}</div>
                    @endif
                  </div>


                <div class="form-group">
                  
                  <textarea type="text" class="form-control" placeholder="Description in English" name="description_en" value="{{ old('descriptin_en') }}"></textarea>
                  @if($errors->has('description_en'))
                    <div class="alert alert-danger">{{$errors->first('description_en')}}</div>
                  @endif
                </div>


                </div> {{-- contain --}}

                <div class="form-group title_father">
                  <label class="title_son"> Sale</label>
                </div>

                <div class="contain">
                  <div class="form-group">  
                    <input type="text" class="form-control"  placeholder="price of purchase" name="purchase" value="{{ old('purchase') }}">
                    @if($errors->has('name_en'))
                      <div class="alert alert-danger">{{$errors->first('purchase')}}</div>
                    @endif
                  </div>

                  <div class="form-group">  
                   
                    <input type="text" class="form-control"  placeholder="price of sale" name="sale" value="{{ old('sale') }}">
                    @if($errors->has('name_en'))
                      <div class="alert alert-danger">{{$errors->first('sale')}}</div>
                    @endif
                  </div>
                 </div> {{-- contain --}}



                <div class="form-group title_father">
                  <label class="title_son"> Stock</label>
                </div>

                <div class="contain">
                  <div class="form-group">                   
                    <input type="text" class="form-control"  placeholder="Stock" name="stock" value="{{ old('stock') }}">
                    @if($errors->has('stock'))
                      <div class="alert alert-danger">{{$errors->first('stock')}}</div>
                    @endif
                  </div>
                </div> {{-- contain --}}
                


              
         
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form> {{-- End form  --}}
          </div>
          <!-- /.box -->

@stop 
@stop