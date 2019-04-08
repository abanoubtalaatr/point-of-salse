@extends('dashboard.index')
@section('content')
  <!-- general form elements -->
  <div class="box box-primary ">
    <div class="box-header with-border">
      <h3 class="box-title">Add New client</h3>
    </div>
  

    <hr>
    <!-- /.box-header -->
    <!-- form start -->
   
      <form role="form" action="{{ route('dashboard.client.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
      
        <div class="form-group">
            <label>Name of Client </label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
            @if($errors->has('name'))
            <div class="alert alert-danger">
              {{$errors->first('name')}}
            </div>
            @endif
        </div>


         <div class="form-group">
            <label >Address </label>
            <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Enter Address">
            @if($errors->has('address'))
            <div class="alert alert-danger">
              {{$errors->first('address')}}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label >Phone </label>
            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter phone">

            @if($errors->has('phone'))
            <div class="alert alert-danger">
              {{$errors->first('phone')}}
            </div>
            @endif
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>   {{-- box-body --}}   
      </form> {{-- End form  --}}
  
   
  </div>
  <!-- /.box -->

@stop 
