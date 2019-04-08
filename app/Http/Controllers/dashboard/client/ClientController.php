<?php

namespace App\Http\Controllers\dashboard\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\client;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $per = self::get_permission();
          $client = client::all();
          return view('dashboard.client.add',compact('per','client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
         $request->validate([
            'name'=>'required',
            'phone'=>'required|min:3',
            'address'=>'required'
        ]);
                 
        $client = new client;

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        
      
        if($client->save()){
            return redirect()->route('dashboard.client.show');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $per = self::get_permission();
        $all = client::all();
        return view('dashboard.client.show',compact('all','per'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
     $per = self::get_permission();
     $all = client::all();
     return view('dashboard.client.edit',compact('per','all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request,$id){
         

        $client = client::find($id)->update($request->all());
        return redirect(route('dashboard.client.show'));
    }




    public function delete(){
     $all = client::all();
     $per = self::get_permission();
    
      return view('dashboard.client.delete',compact('per','all'));
    }// end delete function


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function edit_client($id){
   
    $per = self::get_permission();
    $client = client::find($id);
   
   
    return view('dashboard.client.edit_client',compact(
        'per','client'));
    }
    public function delete_client($id){
     $per = self::get_permission();
     $user = client::find($id)->delete();
    return redirect(route('dashboard.client.delete'));
    }

}
