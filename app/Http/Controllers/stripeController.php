<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Session;

use Stripe;
use App\Models\cart;
use App\Models\Order;

class stripeController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe($price)

    {

     if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
            $cart=cart::where('user_id',Auth::id())->get();
        }
        else{
            $count='';
        }
        $price=$price;

        return view('stripe',compact('price','count'));

    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {
         if(Auth::check()){
            $count=cart::where('user_id',Auth::id())->count();
            $cart=cart::where('user_id',Auth::id())->get();
        }
        else{
            $count='';
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create ([

                "amount" => $request->price * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com."

        ]);

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
            $order->payment='paid';
            $order->save();
        }
        cart::where('user_id',Auth::id())->delete();

        return redirect()->back()->with('success', 'Payment successful!');





    }

}
