<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\permission_admins;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



   // by using session id can get the permission for this person
   protected function get_permission(){
       
   	  if(session()->get('user_id')){
      
        // this array for stor table name and permission for this table 
        $all = [];
   	  	// admin variabe for get the admin belong this id that came from session id  
        $admin  = permission_admins::where('id_admin',session()->get('user_id'))->get();
        
    
        // this foreach for loop on admin variable and get permsion for this admin
        // and stor it in all array 
        foreach ($admin as $key => $value) {
          $exploded = explode(',', $admin[$key]->permission);
          $all [$admin[$key]->table] = $exploded;
          
        }
        
        return $all;

                
   	  }else{
   	  	return view('dashboard.login');
   	  }
     
    }// get_permision 

}// End class controller
