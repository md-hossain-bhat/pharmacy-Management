<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\Unit;
use App\Category;
use App\Company;
use App\Brand;
use Session;
use Auth;
class ProductController extends Controller
{
    public function products(){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        Session::put('page','products');
        $products = Product::select('id','supplier_id','company_id','category_id','brand_id','product_name','unit_id')->with(['supplier','unit','category'])->get();
        return view('admin.products.products')->with(compact('products'));
    }


    public function AddEditProduct(Request $request, $id=null){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        if ($id=="") {
            $data['title'] ="Add Product";
            $product = new Product;
            $productdata = array();
            $message ="Product Add Successfully!";
        }else{
            $data['title'] ="Edit Product";
            $productdata = Product::where('id',$id)->first();
            // $getCategories = json_decode(json_encode($getCategories),true);
            // echo "<pre>"; print_r($getCategories); die;
            $product = Product::find($id);
            $message ="Product Update Successfully!";
        }
    if ($request->isMethod('post')) {
        $data = $request->all();
    // echo "<pre>"; print_r($data); die;
        $rulse = [
            'product_name' => 'required',
        ];

        $customMessage = [
            'product_name.required' =>'name is required',
        ];
        $this->validate($request,$rulse,$customMessage);

        
        $product->supplier_id  =$data['supplier_id'];
        $product->unit_id      =$data['unit_id'];
        $product->company_id  =$data['company_id'];
        $product->category_id  =$data['category_id'];
        $product->brand_id     =$data['brand_id'];
        $product->product_name =$data['product_name'];
        $product->user_id      = Auth::guard('admin')->user()->id;
        $product->quantity     =0;
        $product->save();

        Session::flash('success_message',$message);
        return redirect("admin/products");
    }
    $data['products'] = Product::all();
    $data['suppliers'] = Supplier::all();
    $data['units'] = Unit::all();
    $data['companies'] = Company::get();
    $data['categories'] = Category::get();
    $data['brands'] = Brand::get();
    return view('admin.products.add_edit_product',$data)->with(compact('productdata'));
}

    public function deleteProduct($id){

        Product::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Product has been deleted Successfully!");
    }
}
