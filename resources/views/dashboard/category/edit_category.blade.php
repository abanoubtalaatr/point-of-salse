@extends('dashboard.index')
@section('content')

<!-- general form elements -->
          <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Update Category</h3>
            </div>
         

            <hr>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.category.update',$category->id)}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">

                <div class="form-group">
                  <label> Arbic Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Arbic Name" name="name_ar" value="{{$category->name_ar}}">
                  @if($errors->has('name_ar'))
                    <div class="alert alert-danger">{{$errors->first('name_ar')}}</div>
                  @endif
                </div>

                <div class="form-group">   
                 <label>English Name</label> 
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="English Name" name="name_en" value="{{$category->name_en}}">
                  @if($errors->has('name_en'))
                    <div class="alert alert-danger">{{$errors->first('name_en')}}</div>
                  @endif
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
@stop