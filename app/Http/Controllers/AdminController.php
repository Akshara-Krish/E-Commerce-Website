<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function test(){
        return "This is admin page";
    }

    public function addcategory(){
        return view('admin.category.addcategory');
    }

    public function storecategory(Request $request){
        $category=new category;
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('success','Category added successfully');
    }

    public function viewcategory(){
        $category=Category::all();
        return view('admin.category.viewcategory',compact('category'));
    }

    public function editcategory($id){
        $category=category::findOrFail($id);
        return view('admin.category.editcategory',compact('category'));

    }
    public function updatecategory(Request $request,$id){
        $category=category::findOrFail($id);
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('success','Category updated successfully');
    }

    public function deletecategory($id){
        $category=category::findorFail($id);
        $category->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }
}
