<?php

namespace App\Http\Controllers\dashboard\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\permission_admins;
class AdminController extends Controller
{
   
    
	public function create(){

        $per = self::get_permission();

		  return view('dashboard.admin.create',compact('per'));
	}

    public function show(){
    	$per = self::get_permission();
        $all = Admin::all();
    	return view('dashboard.admin.show',compact('all','per'));
    }// end show 

    public function store(Request $request){

        $request->validate([
        	'firstname'=>'required|min:3',
        	'midname'=>'required|min:3',
        	'lastname'=>'required|min:3',
        	'email' =>'required',
        	'password'=>'required',
        	'level'=>'required',
        	'address'=>'required',
        	

        ]);
        
         $data = $request->except('confirm');
         // stor data in admins table 
       Admin::create($data);
         // to get id for this person
         $id = Admin::where('email',$request->email)->first();

         // this array for stor permission for all this table 
         $tables = array('admin','product','category','client','order');
         
        // stor data in permssion_admins table 
        foreach ($tables as $key => $value) {
         if(isset($request->$value)){
          $admin_permission_table = new permission_admins();
          
          $admin_permission_table->id_admin = $id->id;
          $convert = implode(',', $request->$value);
          $admin_permission_table->permission = $convert;
          $admin_permission_table->table = $value;
          $admin_permission_table->save();
         }
         
        }
        
         return redirect()->route('dashboard.admin.show');

    }// end store 

   // this for show edit page
   public function edit(){
   	 $per = self::get_permission();
     $all = Admin::all();
     return view('dashboard.admin.edit',compact('per','all'));
   }
  
  // Start edit_single  this for edit individual admins
  public function edit_single($id){
  	$per = self::get_permission();
  	$user = Admin::find($id);

  	return view('dashboard.admin.edit_single',compact(
  		'per','user'));
  }// end edit_single 

  public function update(Request $request,$id){

  	$user = Admin::find($id)->update($request->all());
  	return redirect(route('dashboard.admin.show'));
  }
   // Start delete function 
   public function delete(){
   	 $all = Admin::all();
   	 $per = self::get_permission();
  	
   	  return view('dashboard.admin.delete',compact('per','all'));
   }// end delete function


   // Start Delte Admin
   public function delete_admin($id){
     $per = self::get_permission();
     $user = Admin::find($id)->delete();
  	return redirect(route('dashboard.admin.delete'));
   }// end delete admin

}// end class
