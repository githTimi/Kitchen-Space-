<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    //
    public function index()
    {
        $order = Order::all();
        return view('admin.index', compact('order'));
    }

     public function store(Request $request)
    {
        $user_id=Auth()->user()->id;
       $cart= Cart::where('userid',$user_id)->get();
       
        foreach($cart as $carts){
            $order = new Order;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->title = $carts->title;
            $order->quantity = $carts->quantity;
            $order->price = $carts->price * $carts->quantity;
            $order->img = $carts->img;
            $order->delivery_status = 'processing';
            $order->save();

            $data = Cart::find($carts->id);
            $data->delete();
        }
       

        return redirect()->back();
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'delivered';
        $order->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }
      
    public function book_table(Request $request)
    {
    
        $book = new Book;
        $book->phone = $request->phone;
        $book->guests = $request->guests;
        $book->time = $request->time;
        $book->date = $request->date;
        
        
        $book->save();

        return redirect()->back()->with('success', 'Table booked successfully!');
    }
public function book_destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->back();
    }

}
