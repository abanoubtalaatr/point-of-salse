<?php

namespace App\Http\Controllers\dashboard\order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order;
use App\category;
use App\product;
class OrderController extends Controller
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
    public function create($id)
    {
          $per = self::get_permission();
          $products = [];
         
          $category = category::all();
         
           
          foreach ($category as $key => $value) {
           
              $products [$value->name_en]  = product::where('category_id',"$value->id")->get();
              
          }
         
          
         
          return view('dashboard.order.add',compact('per','category','products'));
    }
    public function calc(){
       
    if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
       
        $info = product::where('id',$_GET['id'])->get()->first();
        $information = ','.$info->name_en ."," ;
        $information  .= $info->sale_price .",";

      }
       echo json_encode( $information);
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
                 
        $order = new order;

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        
      
        if($order->save()){
            return redirect()->route('dashboard.order.show');
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
        $all = order::all();
        return view('dashboard.order.show',compact('all','per'));
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
     $all = order::all();
     return view('dashboard.order.edit',compact('per','all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request,$id){
         

        $order = order::find($id)->update($request->all());
        return redirect(route('dashboard.order.show'));
    }




    public function delete(){
     $all = order::all();
     $per = self::get_permission();
    
      return view('dashboard.order.delete',compact('per','all'));
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
    public function edit_order($id){
   
    $per = self::get_permission();
    $order = order::find($id);
   
   
    return view('dashboard.order.edit_order',compact(
        'per','order'));
    }

    public function delete_order($id){
     $per = self::get_permission();
     $order = order::find($id)->delete();
     return redirect(route('dashboard.order.delete'));
    }

}
