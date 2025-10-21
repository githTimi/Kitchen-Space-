<?php

namespace App\Http\Controllers;
use \App\Models\Food;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_food()
    {
        return view('admin.add_food');
    }

    public function upload_food(Request $request)
    {
        $data = new Food;

        $data->title = $request->title;
        $data->details = $request->details;
        $data->price = $request->price;
       $image = $request->img;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->img->move('foodimage', $imagename);
       $data->img = $imagename;

        $data->save();

       // return redirect()->back()->with('message', 'Food Added Successfully');
       $food = Food::all();
        return view('admin.view_food', compact('food'));
    }

    public function view_food()
    {
        $food = Food::all();
        return view('admin.view_food', compact('food'));
    }

    public function delete_food($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Food Deleted Successfully');
    }

    public function destroy($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Food Deleted Successfully');
    }
    public function update_food($id)
    {
        $food = Food::find($id);
        return view('admin.update_food', compact('food'));
    }
    public function update(Request $request, $id)
{
    $food = Food::findOrFail($id);

    // validate input
    

    // update fields
    $food->title = $request->title;
    $food->details = $request->details;
    $food->price = $request->price;

    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('foodimage'), $imageName);
        $food->img = $imageName;
    }

    $food->save();
    $food = Food::all();
        return view('admin.view_food', compact('food'));
    
}
 

}
