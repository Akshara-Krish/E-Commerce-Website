<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Favourites;
use App\Models\cart;
class ProductController extends Controller
{
    //
    public function addproduct(){
        return view('admin.product.addproduct');

    }
    public function viewproduct(){
        $product = Product::paginate(10);
        return view('admin.product.viewproduct', compact('product'));
    }


    public function storeproduct(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagepath=null;
        if($request->hasFile('image')){
            $imagepath = $request->file('image')->store('product', 'public');
        }
        $product = New product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->image = $imagepath;
        $product->save();
        return redirect()->route('viewproduct')->with('success', 'Product added successfully');
    }

    public function editproduct($id){
        $product = Product::findOrFail($id);
        return view('admin.product.editproduct', compact('product'));
    }

    public function updateproduct(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = Product::findOrFail($id);
        $imagepath=$product->image;
        if($request->hasFile('image')){
            $imagepath = $request->file('image')->store('product', 'public');
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->image = $imagepath;
        $product->save();
        return redirect()->route('viewproduct')->with('success', 'Product updated successfully');
    }

    public function deleteproduct($id){
        $product = Product::findOrFail($id);
        $imagepath = public_path('storage/' . $product->image);
        $product->delete();
        if(file_exists($imagepath)){
            unlink($imagepath);
        }
        return redirect()->route('viewproduct')->with('success1', 'Product deleted successfully');
    }

    public function searchproduct(Request $request){
        $product=product::where('name','LIKE','%'.$request->search.'%')->
                          orWhere('description','LIKE','%'.$request->search.'%')
                          ->paginate(2);
        return view('admin.product.viewproduct',compact('product'));
    }

    public function productdetails($id){
         $favourites = Favourites::where('user_id', Auth::id())
                ->where('status', 1)
                ->pluck('product_id')
                ->toArray();
         if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
        }
        else{
            $count='';
        }
        $product=product::findOrFail($id);

        return view('product_details',compact('product','count','favourites'));
    }



}
