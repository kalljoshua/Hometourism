<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use Input, Redirect;

class AdminTypesController extends Controller
{
    //
    public function showAll()
    {
      # code...
      $types = Type::all();
      return view('admin.types')
      ->with('types',$types);
    }

    public function typeForm()
    {
      return view('admin.new_type');
    }

    public function submitType()
    {
      $type = new Type();
      if(Input::has('name')) $type->name = Input::get('name');
      if($type->save())
      {
          flash('Type has successfully been added.')->success();
          return redirect(route('admin.all.types'));
      }

      //return "submition awaiting";
    }

    public function edit(Request $request,$id)
    {
      $type = Type::find($id);
      return view('admin.edit_type')
      ->with('type',$type);
    }

    public function editSubmit(Request $request)
    {
      if(Input::has('id')) $id = Input::get('id');
      $type = Type::find($id);
      if(Input::has('name')) $type->name = Input::get('name');
      if($type->save())
      {
          flash('Type has successfully been Edited.')->success();
          return redirect(route('admin.all.types'));
      }else{
        flash('Failed to edit Type')->error();
        return redirect(route('admin.all.types'));
      }
    }

    function delete(Request $request,$id){
      $type = Type::find($id);
      return view('admin.admin_type_delete')
      ->with('type',$type);
    }

    function destroy(Request $request){
      $id = $request->input('id');

      if(Type::destroy($id)){
        flash('Type deleted successfully')->success();
        return redirect()->route('admin.all.types');
      }else{
        flash('Failed to delete type')->error();
        return redirect()->route('admin.all.types');
      }
    }
}
