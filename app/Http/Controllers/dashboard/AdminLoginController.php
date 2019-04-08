<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\permission_admins;
class AdminLoginController extends Controller
{

  
  // this function to show login form for admin 
   public function showLoginForm(){
   	    return view('dashboard.login');
   }

   // This function for check if every thing belong this form is correct
   public function login(Request $request){
		 // Validate the form data

		 $this->validate($request, [
		 'email' => 'required|email',
		 'password' => 'required|min:6'
		 ]);
       
      // this for get permission from table permission_admins to send it to 
      // view dashboard.index
       
       if(Admin::where('email',$request->email)->first()){
        
           $id = Admin::where('email',$request->email)->first();
           $fullName = $id->firstname ;
           session([
                 'user_id' => $id->id,
                 'username' => $fullName]
               );
          
           
       }else{
        return view('dashboard.login');
       }
      

       // this to set user if in session to can access about information for this person 
       
       // this to get permsio and send it to admin function get_permsion exsits in controller class 
       
       

    //this for check the email and password are correct 
   if(Admin::where('email',$request->email)->first() 
      && Admin::where('password',$request->password)){
         $per = self::get_permission();

       return view('dashboard.index',compact('per'));
    }    
   
 }// End log in 

// start showRegisterForm 
 public function showRegisterForm(){
 	return view('dashboard.register');

 }// end showRegisterForm  



}// End the class
