<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\cart;

class OrderController extends Controller
{
    //
    public function showorder(){
         $orders=Order::with('product','user')->get();
        return view('admin.order.vieworder',compact('orders'));
    }

    public function changestatus(Request $request , $id){
        $order=Order::findOrFail($id);
        $order->status=$request->status;
        $order->save();
        return redirect()->back()->with('success','Status Updated Successfully');
    }
    public function orderedproduct()
{
    if(Auth::check()){
        $count = Cart::where('user_id',Auth::id())->count();
        $cart = Cart::where('user_id',Auth::id())->get();
    } else {
        $count = '';
        $cart = [];
    }

   $orders = Order::with('product','user') ->where('user_id',Auth::id())->whereHas('product')->get();
    return view('vieworderedproduct',compact('orders','count','cart'));
}
    public function downloadpdf($id){
        $data=Order::with('product', 'user')->findOrFail($id);
        $pdf = pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }

}
