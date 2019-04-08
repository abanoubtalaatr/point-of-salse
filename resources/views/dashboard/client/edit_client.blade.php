@extends('dashboard.index')
@section('content')
<!-- general form elements -->
  <div class="box box-primary ">
    <div class="box-header with-border">
      <h3 class="box-title">edit Client</h3>
    </div>
  

    <hr>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ route('dashboard.client.update',$client->id)}}" method="POST">
      {{ csrf_field() }}
      <div class="box-body">
       <div class="form-group">
         <label>Name </label>
         <input type="text" name="name" value="{{$client->name}}" class="form-control">
         @if($errors->has('name'))
         <div class="alert alert-danger">{{$errors->first('name')}}</div>
         @endif
       </div>

       <div class="form-group">
         <label>Phone </label>
         <input type="text" name="phone" value="{{$client->phone}}" class="form-control">
         @if($errors->has('phone'))
         <div class="alert alert-danger">{{$errors->first('phone')}}</div>
         @endif
       </div>

       <div class="form-group">
         <label>Address </label>
         <input type="text" name="address" value="{{$client->address}}" class="form-control">
         @if($errors->has('address'))
         <div class="alert alert-danger">{{$errors->first('address')}}</div>
         @endif
       </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">update</button>
      </div>
    </form> {{-- End form  --}}
  </div>
  <!-- /.box -->

@stop