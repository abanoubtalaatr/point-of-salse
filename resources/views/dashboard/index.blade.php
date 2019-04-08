<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	@section('tittle','dashboard')
  @show
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/bootstrap.min.css') }}"  >
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/fontawsome/css/all.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/media/extra_small.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/index.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/media/extra_screen.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/media/medium.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/media/mobile.css') }}">
  

</head>
<body>

  <nav class="navbar navbar-dark bg-dark col-md-12 col-sm-9 col-xs-6">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <ul class="list-unstyled">
        
        <li> 
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </li>
      </ul>
    </div>

    <div class="belong_you col-md-4 col-sm-6 col-xs-12">
      <ul class="list-unstyled">


        <li id="messages">
            <span>3</span>
             <i class="fas fa-envelope"></i>


            <div class="all_messages hidd" id = 'all_messages'>
              <h3>
                <i class="fas fa-mail-bulk"></i>
                messages
              </h3>
              <hr>
              <div class="messages">
               <div class="image col-md-3">
                 <img src="/resources/views/dashboard/images/Koala.jpg">
               </div>
               <div class="message col-md-9">
                 <h4>john deo</h4>
                 <p>want to create your customized data generator for your app</p>
               </div>
             </div> <!-- End messages -->
              <hr>
             <div class="messages">
               <div class="image col-md-3">
                 <img src="../images/Koala.jpg">
               </div>
               <div class="message col-md-9">
                 <h4>abanoub talaat</h4>
                 <p>want to create your customized data generator for your app</p>
               </div>
           </div> <!-- End messages -->
        </div> <!-- End all_messages -->
         
       </li>  <!-- End the li of messages -->

        <li id= 'notifcation' class="notifcation"> 
          <span>2</span>
          <i class="fas fa-bell"></i> 

          <div class="notficate hidd">
            this for test only 
          </div>
        </li>

        <li> 
          {{--<img src="../images/Koala.jpg">--}}
          {{session()->get('username')}}
          <div class="setting hidd">
            <ul class="list-unstyled">
              <li> 
                
                <a href="">
                  <i class="fas fa-cogs"></i>
                  <p>setting</p>
                </a> 
              </li>

              <li> 
                
                <a href="">
                  <i class="fas fa-user"></i>
                  <p>profile</p>
                </a> 
              </li>

              <li> 
                
                <a href="">
                  <i class="fas fa-cogs"></i>
                  <p>log out</p>
                </a> 

              </li>
            </ul>
          </div>
        </li>

      </ul> <!-- End ul  that contain lis(notifaction,message,setting) -->
    </div> <!-- End col-md-3 -->
  </nav> <!-- End the navbar -->
  

   {{-- Start section breadcrub --}}
  @section('breadcrumb')
    <nav aria-label="breadcrumb " class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
  </nav>
  @show 

 {{--  Start  container contain section search and add  --}}
<div class="container  pb-1 overflow-hidden allWidth_mins_left_side pl" style="padding-top:3px;">
  {{--  Start section for search --}}
    @section('search')

    @show 
    {{-- End section for search  --}}


   {{--  Start add section  --}}
    @section('add')
    @show

    {{-- End section  add --}}
</div> 
 {{--  End  container contain section search and add  --}}
  

 {{-- End section breadcrub --}}
 
 {{-- Section Content --}}
  @yield('content')
 {{-- End section content --}}


 {{-- Start class left_side --}}

  <div class="left_side">
     <div class="admin_header">
       <h3>
        <i class="fas fa-tools"></i>
        <span>Adminator</span>
       </h3>
     </div>

     <div class="admin_function">
       <ul class="list-unstyled">

         <li> 
           <a href="{{route('dashboard.index')}}">
            <i class="fas fa-home"></i>
             <span>Dashboard</span>
           </a>
        </li>



        @if(isset($per['admin']))
        
        {{-- Start li supervisor --}}
          <li class="category"> 
            <i class="fas fa-clipboard" style="margin-right: 4px"></i>
            <span>Admins</span>
           <i class="fas fa-chevron-circle-down " style="float: right;margin-top: 6px; color:white;"></i>
           <ul class="list-unstyled hidd">
              @foreach($per['admin'] as $key => $value)
              <li> <a href="{{route("dashboard.admin.$value")}}"> {{$value}}  </a>  </li>
              @endforeach  
            </ul>
         </li>
         {{-- End li supervisor --}}
        @endif


       

      

       
        
        @if(isset($per['category']))
        
        {{-- Start li supervisor --}}
          <li class="category"> 
            <i class="fas fa-clipboard" style="margin-right: 4px"></i>
            <span>Category</span>
           <i class="fas fa-chevron-circle-down " style="float: right;margin-top: 6px; color:white;"></i>
           <ul class="list-unstyled hidd">
              @foreach($per['admin'] as $key => $value)
              <li> <a href="{{route("dashboard.category.$value")}}"> {{$value}}  </a>  </li>
              @endforeach  
            </ul>
         </li>
         {{-- End li supervisor --}}
        @endif
       
        
        @if(isset($per['product']))
        {{-- Start li supervisor --}}
          <li class="category"> 
            <i class="fas fa-clipboard" style="margin-right: 4px"></i>
            <span>Product</span>
           <i class="fas fa-chevron-circle-down " style="float: right;margin-top: 6px; color:white;"></i>
           <ul class="list-unstyled hidd">
              @foreach($per['product'] as $key => $value)
              <li> <a href="{{route("dashboard.product.$value")}}"> {{$value}}  </a>  </li>
              @endforeach  
            </ul>
         </li>
         {{-- End li supervisor --}}
        @endif


      
        @if(isset($per['client']))
        
        {{-- Start li supervisor --}}
          <li class="category"> 
            <i class="fas fa-clipboard" style="margin-right: 4px"></i>
            <span>Client</span>
           <i class="fas fa-chevron-circle-down " style="float: right;margin-top: 6px; color:white;"></i>
           <ul class="list-unstyled hidd">
              @foreach($per['client'] as $key => $value)
              <li> <a href="{{route("dashboard.client.$value")}}"> {{$value}}  </a>  </li>
              @endforeach  
            </ul>
         </li>
         {{-- End li supervisor --}}
        @endif
       
        

        
       </ul> 
     </div><!--  End of admin_function  -->
  </div> <!-- left_side -->
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/dashboard/index.js') }}"></script>
</body>
</html>