<?php

namespace App\Http\Controllers\dashboard\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;

class CategoryController extends Controller
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
          return view('dashboard.category.add',compact('per'));
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
            'name_ar'=>'required|min:3',
            'name_en'=>'required|min:3',
        ]);

        $category = new category;

        $category->name_en = $request->name_en;
        $category->name_ar = $request->name_ar;
        $category->save();

        return redirect()->route('dashboard.category.show');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $per = self::get_permission();
        $all = category::all();
        return view('dashboard.category.show',compact('all','per'));
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
     $all = category::all();
     return view('dashboard.category.edit',compact('per','all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request,$id){

    $user = category::find($id)->update($request->all());
    return redirect(route('dashboard.category.show'));
  }
    public function delete(){
     $all = category::all();
     $per = self::get_permission();
    
      return view('dashboard.category.delete',compact('per','all'));
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
    public function edit_category($id){
    $per = self::get_permission();
    $category = category::find($id);

    return view('dashboard.category.edit_category',compact(
        'per','category'));
    }
    public function delete_category($id){
     $per = self::get_permission();
     $user = category::find($id)->delete();
    return redirect(route('dashboard.category.delete'));
    }

}
