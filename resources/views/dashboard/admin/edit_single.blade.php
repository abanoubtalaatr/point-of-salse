@extends('dashboard.index')
@section('content')

<!-- general form elements -->
          <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
            </div>
         

            <hr>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.admin.update',$user->id)}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">

                <div class="form-group col-md-4 float-left">
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name" name="firstname" value="{{$user->firstname}}">
                  @if($errors->has('firstname'))
                    <div class="alert alert-danger">{{$errors->first('firstname')}}</div>
                  @endif
                </div>

                <div class="form-group col-md-4 float-left">    
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mid Name" name="midname" value="{{$user->midname}}">
                  @if($errors->has('midname'))
                    <div class="alert alert-danger">{{$errors->first('midname')}}</div>
                  @endif
                </div>


               <div class="form-group col-md-4 float-left ">
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name" name="lastname" value= "{{$user->lastname}}">
                  @if($errors->has('lastname'))
                    <div class="alert alert-danger"> {{$errors->first('lastname')}}</div>
                  @endif
                </div>

                <div class="form-group col-md-12">
                  <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email" value="{{$user->email}}">
                  @if($errors->has('email'))
                    <div class="alert alert-danger"> {{$errors->first('email')}}</div>
                  @endif
                </div>

                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address" name="address"  value="{{$user->address}}">
                  @if($errors->has('address'))
                    <div class="alert alert-danger"> {{$errors->first('address')}}</div>
                  @endif
                </div>

               

                <div class="form-group col-md-12">
                    
                    <select class="form-control" id="exampleFormControlSelect1" name="level">
                      <option value="{{$user->level}}">
                      	   @if($user->level =='1')
					      	  {{ 'Super Admin'}}
					      	@endif
					      	@if($user->level =='2')
					      	  {{ 'Admin'}}
					      	@endif
					      	@if($user->level =='3')
					      	  {{ 'Boss Supervisor'}}
					      	@endif
					      	@if($user->level =='4')
					      	  {{ 'Supervisor'}}
							@endif</option>
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
                  
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{$user->password}}" >
                  @if($errors->has('password'))
                    <div class="alert alert-danger"> {{$errors->first('password')}}</div>
                  @endif
                </div>
               <div class="form-group col-md-12 ">
                 
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="confirm">
                  @if($errors->has('confirm'))
                    <div class="alert alert-danger"> {{$errors->first('confirm')}}</div>
                  @endif
                </div>

                
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer pl-1">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
@stop