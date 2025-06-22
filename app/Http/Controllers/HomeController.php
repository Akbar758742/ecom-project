<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\user;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        if(Auth::id())
        {
           $user_id=Auth::user()->id;
        $count=Cart::where('user_id',$user_id)->count();
        }
        else
        {
            $count=0;
        }
        $product = Product::paginate(16);


        return view('home.index', compact('product','count'));
    }
    public function login_home()
    {
        $product = Product::paginate(16);
           if(Auth::id())
        {
           $user_id=Auth::user()->id;
        $count=Cart::where('user_id',$user_id)->count();
        }
        else
        {
            $count=0;
        }
        return view('home.index', compact('product','count'));
    }
    public function product_details($id)
    {
        $product = Product::find($id);
   if(Auth::id())
        {
           $user_id=Auth::user()->id;
        $count=Cart::where('user_id',$user_id)->count();
        }
        else
        {
            $count=0;
        }
        return view('home.product_details', compact('product','count'));
    }

    public function add_to_cart($id)
    {
       $product_id=$id;
       $user=Auth::user();
       $user_id=$user->id;

       $cart=new Cart();
       $cart->user_id=$user_id;
       $cart->product_id=$product_id;
       $cart->save();
       toastr()->timeout(2000)->success('Product added to the cart Successfully');
       return redirect()->back();

    }

    public function show_cart(){
        if(Auth::id())
        {
           $user_id=Auth::user()->id;
        $count=Cart::where('user_id',$user_id)->count();
         $cart=Cart::where('user_id',$user_id)->get();
        }
        else
        {
            $count=0;
            $cart = collect();
        }


        return view('home.show_cart',compact('cart','count'));
    }

    public function remove_cart($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function place_order( Request $request){

        $user_id=Auth::user()->id;
        $name=$request->name;
        $phone=$request->phone;
        $address=$request->address;

        $cart=Cart::where('user_id',$user_id)->get();
        foreach($cart as $cart){
            $order=new Order();
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->user_id=$user_id;
            $order->product_id=$cart->product_id;

            // $order->payment_status='pending';
            // $order->delivery_status='pending';
            $order->save();
        }
        $remove_cart=Cart::where('user_id',$user_id)->get();
        // foreach($cart as $cart){
        //     $cart->delete();
        // }

        foreach($remove_cart as $remove){
          $data=Cart::find($remove->id);
          $data->delete();
        }
         toastr()->timeout(2000)->success('Product Order Placed Successfully');
        return redirect()->back();

    }

}
