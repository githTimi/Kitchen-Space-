<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
USE \App\Models\Food;
USE \App\Models\User;
USE \App\Models\Cart;


class CartController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->usertype == 'admin') {
            return view('cart.index');
        } else {
           $cart = Cart::where('userid', Auth::user()->id)->get();
        return view('cart.index', compact('cart'));
        }
       // return view('home');
    }
    public function update(Request $request, $id)
{
    $item = Cart::where('userid', auth()->id())->findOrFail($id);

    if ($request->action === 'increase') {
        $item->quantity++;
    } elseif ($request->action === 'decrease' && $item->quantity > 1) {
        $item->quantity--;
    }

    $item->save();
     
    return back();
}

public function destroy($id)
{
    $item = Cart::where('userid', auth()->id())->findOrFail($id);
    $item->delete();
    return back();
}


}
