<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use App\Models\Order;
class CartController extends Controller
{
    //
    public function addtocart($id){
         $cart=new cart();
        $products=product::findOrFail($id);

        $cart->user_id=Auth::id();
        $cart->product_id=$products->id;
        $cart->save();
        return redirect()->back()->with('success','good');


    }

    public function cartproduct(){
        if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
            $cart=cart::where('user_id',Auth::id())->get();
        }
        else{
            $count='';
        }
        return view('viewcartproduct',compact('count','cart'));
    }

    public function deletecart($id){
        $cart=cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
    public function checkout(Request $request){

        $cart_products=cart::where('user_id',Auth::id())->get();
        $address=$request->receiver_address;
        $phone=$request->receiver_phone;
        foreach($cart_products as $cart_product){
            $order=new Order();
            $order->user_id=Auth::id();
            $order->product_id=$cart_product->product_id;
            $order->receiver_name=$request->receiver_name;
            $order->receiver_address=$address;
            $order->receiver_phone=$phone;
            $order->save();
        }
        cart::where('user_id',Auth::id())->delete();
        return redirect()->back()->with('success','Order Placed Successfully');

    }
    public function shop(){
          $count = 0;
    $cart = [];

         if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
            $cart=cart::where('user_id',Auth::id())->get();
        }
        else{
            $count='';
        }
        return view('shop',compact('count','cart'));
    }
    public function contact(){
          $count = 0;
    $cart = [];

         if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
            $cart=cart::where('user_id',Auth::id())->get();
        }
        else{
            $count='';
        }
        return view('contact',compact('count','cart'));
    }
    public function testimonial(){
          $count = 0;
    $cart = [];

         if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
            $cart=cart::where('user_id',Auth::id())->get();
        }
        else{
            $count='';
        }
        return view('testimonial',compact('count','cart'));
    }
    public function whyus(){
          $count = 0;
    $cart = [];

         if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
            $cart=cart::where('user_id',Auth::id())->get();
        }
        else{
            $count='';
        }
        return view('whyus',compact('count','cart'));
    }
}
