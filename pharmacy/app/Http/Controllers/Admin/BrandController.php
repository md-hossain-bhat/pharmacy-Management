<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use Session;

class BrandController extends Controller
{
    public function brands(){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        Session::put('page','brands');
        $brands = Brand::select('id','category_id','brand_name')->get();
        return view('admin.brands.brands')->with(compact('brands'));
    }


    public function AddEditBrand(Request $request, $id=null){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        if ($id=="") {
            $title ="Add Genaric";
            $brand = new Brand;
            $branddata = array();
            $message ="Genaric Add Successfully!";
        }else{
            $title ="Edit Genaric";
            $branddata = Brand::where('id',$id)->first();
            // $branddata = json_decode(json_encode($branddata),true);
            // echo "<pre>"; print_r($branddata); die;
            $brand = Brand::find($id);
            $message ="Genaric Update Successfully!";
        }
    if ($request->isMethod('post')) {
        $data = $request->all();
    // echo "<pre>"; print_r($data); die;
        $rulse = [
            'category_id' => 'required',
            'brand_name' => 'required',
        ];

        $customMessage = [
            'category_id.required' =>'company name is required',
            'brand_name.required' =>'Genaric name is required',
        ];
        $this->validate($request,$rulse,$customMessage);

        $brand->category_id     =$data['category_id'];
        $brand->brand_name     =$data['brand_name'];
        $brand->save();

        Session::flash('success_message',$message);
        return redirect("admin/brands");
    }
    $categories = Category::get();
    // dd($categories);die;
    $brands = Brand::get();
    return view('admin.brands.add_edit_brand')->with(compact('title','brands','branddata','categories'));
}

    public function deleteBrand($id){

        Brand::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Genaric has been deleted Successfully!");
    }
}
