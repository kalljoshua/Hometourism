<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Category;
use Input, Redirect;

class AdminSubCategoriesController extends Controller
{
    //
    public function showAll()
    {
      # code...
      $sub_categories = SubCategory::all();
      return view('admin.sub_categories')
      ->with('sub_categories',$sub_categories);
    }

    public function subcategoriesForm()
    {
      $categories = Category::all();
      return view('admin.new_subcategory')
      ->with('categories',$categories);
    }

    public function submitCategory()
    {
      # code...
      $sub_category = new SubCategory();
      if(Input::has('name')) $sub_category->name = Input::get('name');
      if(Input::has('category_id')) $sub_category->category_id = Input::get('category_id');
      if($sub_category->save())
      {
          flash('Sub-Category has successfully been added.')->success();
          return redirect(route('admin.all.subcategories'));
      }else{
        flash('Sub-Category failed to be added.')->warning();
        return redirect(route('admin.all.subcategories'));
      }

      //return "submition awaiting";
    }

    public function edit(Request $request,$id)
    {
      $subcategory = SubCategory::find($id);
      $categories = Category::all();
      return view('admin.edit_subcategory')
      ->with('categories',$categories)
      ->with('subcategory',$subcategory);
    }

    public function editSubmit(Request $request)
    {
      if(Input::has('id')) $id = Input::get('id');
      $subcategory = SubCategory::find($id);
      if(Input::has('name')) $subcategory->name = Input::get('name');
      if(Input::has('category_id')) $subcategory->category_id = Input::get('category_id');
      if($subcategory->save())
      {
          flash('Sub-Category has successfully been Edited.')->success();
          return redirect(route('admin.all.subcategories'));
      }else{
        flash('Failed to edit Sub-Category')->error();
        return redirect(route('aadmin.all.subcategories'));
      }
    }

    function delete(Request $request,$id){
      $subcategory = SubCategory::find($id);
      return view('admin.admin_subcategory_delete')
      ->with('subcategory',$subcategory);
    }

    function destroy(Request $request){
      $id = $request->input('id');

      if(SubCategory::destroy($id)){
        flash('Sub-Category deleted successfully')->success();
        return redirect()->route('admin.all.subcategories');
      }else{
        flash('Failed to delete Sub-Category')->error();
        return redirect()->route('admin.all.subcategories');
      }
    }
}
