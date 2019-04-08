<?php

namespace App\Http\Controllers\dashboard\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\product;
class ProductsController extends Controller
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
          $categories = category::all();
          return view('dashboard.product.add',compact('per','categories'));
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
            'category'=>'required',
            'name_ar'=>'required|min:3',
            'name_en'=>'required|min:3',
            'description_ar'=>'required',
            'description_en'=>'required',
            'purchase'=>'required',
            'sale'=>'required',
            'stock'=>'required'
        ]);


        //  var_dump($request->category);
        //   var_dump($request->name_ar);
        //    var_dump($request->name_en);
        //     var_dump($request->description_ar);
        //      var_dump($request->description_en);
        //       var_dump($request->purchase);
        //        var_dump($request->sale);
        //         var_dump($request->stock);
                 


        $product = new product;

        $product->category_id = $request->category;
        $product->name_ar = $request->name_ar;
        $product->name_en = $request->name_en;
        $product->description_ar = $request->description_ar;
        $product->description_en = $request->description_en;
        $product->purchase_price = $request->purchase;
        $product->sale_price = $request->sale;
        $product->stock = $request->stock;
        if($product->save()){
            return redirect()->route('dashboard.product.show');
        }else{
            echo 'some thing is wrong sir';
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
        $all = product::all();
        return view('dashboard.product.show',compact('all','per'));
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
     $all = product::all();
     return view('dashboard.product.edit',compact('per','all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request,$id){

    $product = product::find($id)->update($request->all());
    return redirect(route('dashboard.product.show'));
  }
    public function delete(){
     $all = product::all();
     $per = self::get_permission();
    
      return view('dashboard.product.delete',compact('per','all'));
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
    public function edit_product($id){
   
    $per = self::get_permission();
    $product = product::find($id);
    $category = category::where('id',$product->category_id)->get()->first();
    $all_category = category::all();
    return view('dashboard.product.edit_product',compact(
        'per','product','category','all_category'));
    }
    public function delete_product($id){
     $per = self::get_permission();
     $user = product::find($id)->delete();
    return redirect(route('dashboard.product.delete'))->with('success','Product deleted successfully');;
    }

}
