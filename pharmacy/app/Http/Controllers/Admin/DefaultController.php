<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\Unit;
use App\Category;
use App\Purchase;
use App\Brand;
use App\Company;
use Session;
use Auth;

class DefaultController extends Controller
{

    public function getComany(Request $request){
        $supplier_id = $request->supplier_id;
        // dd($supplier_id);die;
        $allCompany = Product::with(['company'])->select('company_id')->where('supplier_id',$supplier_id)->groupBy('company_id')->get();
        return response()->json($allCompany);
    }
    public function getCategory(Request $request){
        $company_id = $request->company_id;
        // dd($company_id);
        $allCategory = Product::with(['category'])->where('company_id',$company_id)->get();
        return response()->json($allCategory);
    }


    public function getBrand(Request $request){
        $category_id = $request->category_id;
        // dd($category_id1);
        $allBrand = Brand::where('category_id',$category_id)->get();
        return response()->json($allBrand);
    }
    public function getProduct(Request $request){
        $brand_id = $request->brand_id;
        // dd($brand_id);
        $allProduct = Purchase::with(['product'])->where('brand_id',$brand_id)->get();
        // dd($allProduct);
        return response()->json($allProduct);
    }

    public function getStock(Request $request){
        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        return response()->json($stock);
    }
}
