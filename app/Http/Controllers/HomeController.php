<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
USE \App\Models\Food;
USE \App\Models\User;
USE \App\Models\Cart;
use App\Models\Order;



class HomeController extends Controller
{
    public function index()
    {
        
        if (Auth::user()->usertype == 'admin') {
             $order = Order::all();
             $book = Book::all();
             $user = User::all();
             $total_order = Order::count();
             $total_book = Book::count();
             $total_user = User::count();
        return view('admin.index', compact('order','book','total_order','total_book','total_user'));
          //  return view('admin.index');

        } else {
           $food = Food::all();
        return view('home.index', compact('food'));
        }
       // return view('home');
    }

    public function home_page()
    {
   
        $food = Food::all();
        return view('home.index', compact('food'));
        
    }
    //
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()){
          //  echo "Success";
             $food = Food::find($id);

        $cart_title = $food->title;
        $cart_price = $food->price;
        $cart_img = $food->img;
        $cart_details = $food->details;

        $data = new Cart;
        $data->title = $cart_title;
        $total_price = $cart_price * $request->quantity;
        $data->price = $total_price;
        $data->img = $cart_img;
        $data->details = $cart_details;
        $data->quantity = $request->quantity;
        $data->userid = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Your item has been saved successfully to the cart!');
        }
        else{
            return redirect('login');
        }
       
    }
}
