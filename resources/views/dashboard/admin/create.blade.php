@extends('dashboard.index')
@section('content')
  <!-- general form elements -->
          <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Add New User</h3>
            </div>
          

            <hr>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.admin.store')}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">

                <div class="form-group col-md-4 float-left">
                  <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{ old('firstname') }}">
                  @if($errors->has('firstname'))
                    <div class="alert alert-danger">{{$errors->first('firstname')}}</div>
                  @endif
                </div>

                <div class="form-group col-md-4 float-left">    
                  <input type="text" class="form-control"  placeholder="Mid Name" name="midname" value="{{ old('midname') }}">
                  @if($errors->has('midname'))
                    <div class="alert alert-danger">{{$errors->first('midname')}}</div>
                  @endif
                </div>


               <div class="form-group col-md-4 float-left ">
                  <input type="text" class="form-control"  placeholder="Last Name" name="lastname" value= "{{ old('lastname') }}">
                  @if($errors->has('lastname'))
                    <div class="alert alert-danger"> {{$errors->first('lastname')}}</div>
                  @endif
                </div>

                <div class="form-group col-md-12">
                  <input type="email" class="form-control"  placeholder="Email" name="email" value="{{ old('email') }}">
                  @if($errors->has('email'))
                    <div class="alert alert-danger"> {{$errors->first('email')}}</div>
                  @endif
                </div>

                <div class="form-group col-md-12">
                  <input type="text" class="form-control"  placeholder="Address" name="address"  value="{{ old('address') }}">
                  @if($errors->has('address'))
                    <div class="alert alert-danger"> {{$errors->first('address')}}</div>
                  @endif
                </div>
                <div class="form-group col-md-12">
                    
                    <select class="form-control" id="exampleFormControlSelect1" name="level">
                       <option value="0">Level</option>
                      <option value="1">Super Admin</option>
                      <option value="2">Admin</option>
                      <option value="3">Boss Supervisor</option>
                      <option value="4">Supervisor</option>
                    </select>
                    @if($errors->has('level'))
                       <div class="alert alert-danger"> {{$errors->first('level')}}</div>
                    @endif
                 </div>
                <div class="form-group col-md-12">
                  <input type="password" class="form-control"  placeholder="Password" name="password" >
                  @if($errors->has('password'))
                    <div class="alert alert-danger"> {{$errors->first('password')}}</div>
                  @endif
                </div>
               <div class="form-group col-md-12 ">
                  <input type="password" class="form-control"  placeholder="Confirm Password" name="confirm">
                  @if($errors->has('confirm'))
                    <div class="alert alert-danger"> {{$errors->first('confirm')}}</div>
                  @endif
                </div>
 
                <hr> 

                 <h3>permissions</h3>
                 <hr>
                  

                  <div class="row col-md-12">
                      <div class="list-group col-md-12" id="myList" role="tablist">

                        @foreach($per as  $key => $table)

                          <a class="list-group-item list-group-item-action " data-toggle="list" href="#{{$key}}" role="tab">{{ $key }}</a>
                       
                        @endforeach
                       
                       
                      </div> {{-- End list-group --}}
                  </div>{{--  End row  --}}
                  <!-- List group -->
                

                <!-- Tab panes -->
                <div class="tab-content">
                   @foreach($per as $key => $table)
                       
                   <div class="tab-pane" id="{{$key}}" role="tabpanel">
                   
                    @foreach($table as $value)

                     <div class="check_box">                      
                        <div>
                           <input type="checkbox" name="{{$key}}[]" value="{{$value}}" id="{{$key}}_{{$value}}">
                           <label for ='{{$key}}_{{$value}}'>{{$value}}</label>
                         </div>                       
                       </div> {{--check_box --}}

                    @endforeach
                                                          
                  </div>  {{-- tab-pane  --}} 

                   @endforeach

                </div> {{-- tab-content --}}
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div> {{-- box-footer --}}

            </form> {{-- End form  --}}
          </div>
          <!-- /.box -->

@stop 


@section('breadcrumb')
	<nav aria-label="breadcrumb " class="bread">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item active" aria-current="page">Home</li>
	    <li class="breadcrumb-item active" aria-current="page">create new user</li>
	    
	  </ol>
	</nav>
@stop
