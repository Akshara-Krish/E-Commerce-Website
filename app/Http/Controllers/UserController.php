<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\cart;
use App\Models\Product;
use App\Models\favourites;

class UserController extends Controller
{
    //
    public function index(){
        if(Auth::check() && Auth::user()->user_type == 'admin'){
            return view('admin.dashboard');
    }
    else if(Auth::check() && Auth::user()->user_type == 'user'){
        return view('dashboard');
    }
    }
    public function show(){
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
        //only show latest added product
        $products= Product::latest()->take(8)->get();
        return view('latest_product', compact('products','count','favourites'));
    }

    public function showall(){
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
        $products=product::all();
        return view('viewproduct',compact('products','count','favourites'));
    }

    public function addtocart($id){
         $cart=new cart();
        $products=product::findOrFail($id);

        $cart->user_id=Auth::id();
        $cart->product_id=$products->id;
        $cart->save();
        return redirect()->back()->with('success','good');


    }
    public function users(){
            $users=User::all();
            return view('index',compact('users'));
    }
public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index');
}
}
