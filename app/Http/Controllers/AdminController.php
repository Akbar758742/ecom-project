<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    //
   public function view_category(){
    $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeout(3000)->closeButton()->success('Category Added Successfully');
        return redirect()->back();
    }

    public function delete_category($id){
        $data=Category::find($id);
        $data->delete();
        toastr()->timeout(3000)->closeButton()->success('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id){
        $data=Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id){
        $data=Category::find($id);
        $data->category_name=$request->category;
        $data->save();
        toastr()->timeout(3000)->closeButton()->success('Category Updated Successfully');
        return redirect('view_category');
    }
    public function add_product(){
        $category=Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function insert_product(Request $request){
        $product=new Product;
        // $product->category_id=$request->category_id;
        $product->product_name=$request->title;
        $product->product_price=$request->price;
        $product->product_description=$request->description;
        $product->product_quantity=$request->quantity;
        $product->category=$request->product_category;


        $product_image=$request->product_image;
        if($product_image){

            $image_name=time().'.'.$product_image->getClientOriginalExtension();
            $product_image->move('productimage',$image_name);
            $product->product_image=$image_name;

        }
        $product->save();
        toastr()->timeout(3000)->closeButton()->success('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product(){
        $product=Product::paginate(5);
        return view('admin.view_product',compact('product'));

    }
    public function delete_product($id){
        $product=Product::find($id);
        $image_path='productimage/'.$product->product_image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $product->delete();
        toastr()->timeout(3000)->closeButton()->success('Product Deleted Successfully');
        return redirect()->back();
    }
    public function edit_product($id){
        $product=Product::find($id);
        $category=Category::all();
        return view('admin.edit_product',compact('product','category'));
    }
    public function update_product(Request $request,$id){
        $product=Product::find($id);

        $product->product_name=$request->title;
        $product->product_price=$request->price;
        $product->product_description=$request->description;
        $product->product_quantity=$request->quantity;
        $product->category_id=$request->product_category;
        $product_image=$request->product_image;
        if($product_image){
            $image_path='productimage/'.$product->product_image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $image_name=time().'.'.$product_image->getClientOriginalExtension();
            $product_image->move('productimage',$image_name);
            $product->product_image=$image_name;
        }

        $product->save();
        toastr()->timeout(3000)->closeButton()->success('Product Updated Successfully');
        return redirect('view_product');
    }

    public function search_product(Request $request){
        $search=$request->search;
        $product=Product::where('product_name','like','%'.$search.'%')->orwhere('category','like','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('product'));
    }
}
