<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourites;
use Illuminate\Support\Facades\Auth;

class FavouritesController extends Controller
{
    public function favourite($id)
    {
        $user = Auth::id();

        $fav = Favourites::where('user_id',$user)
                ->where('product_id',$id)
                ->first();

        if(!$fav){
            // first time click → save status 1
            Favourites::create([
                'user_id' => $user,
                'product_id' => $id,
                'status' => 1
            ]);

            return response()->json(['status'=>1]);
        }else{
            // toggle 0/1
            $fav->status = $fav->status == 1 ? 0 : 1;
            $fav->save();

            return response()->json(['status'=>$fav->status]);
        }
    }
}
