<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Input, Redirect;

class AdminCategoriesController extends Controller
{
    //
    public function showAll()
    {
      # code...
      $categories = Category::all();
      return view('admin.categories')
      ->with('categories',$categories);
    }

    public function categoriesForm()
    {
      return view('admin.new_category');
    }

    public function submitCategory()
    {
      # code...
      $category = new Category();
      if(Input::has('name')) $category->name = Input::get('name');
      if(Input::has('description')) $category->description = Input::get('description');
      if($category->save())
      {
          flash('Category has successfully been added.')->success();
          return redirect(route('admin.all.categories'));
      }

      //return "submition awaiting";
    }

    public function edit(Request $request,$id)
    {
      $category = Category::find($id);
      return view('admin.edit_category')
      ->with('category',$category);
    }

    public function editSubmit(Request $request)
    {
      if(Input::has('id')) $id = Input::get('id');
      $category = Category::find($id);
      if(Input::has('name')) $category->name = Input::get('name');
      if(Input::has('description')) $category->description = Input::get('description');
      if($category->save())
      {
          flash('Category has successfully been Edited.')->success();
          return redirect(route('admin.all.categories'));
      }else{
        flash('Failed to edit Category')->error();
        return redirect(route('admin.all.categories'));
      }
    }

    function delete(Request $request,$id){
      $category = Category::find($id);
      return view('admin.admin_category_delete')
      ->with('category',$category);
    }

    function destroy(Request $request){
      $id = $request->input('id');

      if(Category::destroy($id)){
        flash('Category deleted successfully')->success();
        return redirect()->route('admin.all.categories');
      }else{
        flash('Failed to delete category')->error();
        return redirect()->route('admin.all.categories');
      }
    }
}
