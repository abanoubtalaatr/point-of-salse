@extends('dashboard.index')
@section('content')
@section('content')
  <!-- general form elements -->
          <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Category</h3>
            </div>
          

            <hr>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.category.store')}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">

                <div class="form-group">
                	<label> Name of arbic</label>
                  <input type="text" class="form-control" placeholder="Arbic Name" name="name_ar" value="{{ old('name_ar') }}">
                  @if($errors->has('name_ar'))
                    <div class="alert alert-danger">{{$errors->first('name_ar')}}</div>
                  @endif
                </div>

                <div class="form-group">  
                <label> Name of English</label>  
                  <input type="text" class="form-control"  placeholder="English Name" name="name_en" value="{{ old('name_en') }}">
                  @if($errors->has('name_en'))
                    <div class="alert alert-danger">{{$errors->first('name_en')}}</div>
                  @endif
                </div>
         
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form> {{-- End form  --}}
          </div>
          <!-- /.box -->

@stop 
@stop