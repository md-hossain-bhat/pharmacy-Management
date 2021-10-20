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
use App\Purchase;
use Session;
use Auth;
use PDF;
class StockController extends Controller
{
    public function StockReport(){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        Session::put('page','stockreport');
        $products = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('admin.stock.stock-report')->with(compact('products'));
    }

    public function StockReportPdf(){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        $data['products'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        $pdf = PDF::loadView('admin.pdf.stock-report-pdf',$data);
        return $pdf->setPaper('a4')->stream('document.pdf');
    }
    
    public function StockSupplierProductWise(){

        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        Session::put('page','stockSupplierProductwise');

        $data['suppliers'] = Supplier::select('id','name')->get();
        $data['companies'] = Company::select('id','name')->get();
        $data['categories'] = Category::select('id','name')->get();
        $data['brands'] = Brand::select('id','brand_name')->get();
        $data['products'] = Product::select('id','product_name')->get();
        return view('admin.stock.stock-supplier-product-wise',$data);
    }

    public function StockSupplierWisePdf(Request $request){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        $data['products'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('admin.pdf.stock-supplier-wise-report-pdf',$data);
        return $pdf->setPaper('a4')->stream('document.pdf');
    }

    public function StockProductWisePdf(Request $request){
        // dd($request['company_id']);
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }

        if($request['company_id'] && $request['category_id'] && $request['brand_id'] && $request['product_id']){
            $data['products'] = Product::where('company_id',$request['company_id'])->get();
        }else if($request['company_id']){
            $data['products'] = Product::where('company_id',$request['company_id'])->get();
        }else if($request['category_id']){
            $data['products'] = Product::where('category_id',$request['category_id'])->get();
        }else if($request['brand_id']){
            $data['products'] = Product::where('brand_id',$request['brand_id'])->get();
        }else if($request['product_id']){
            $data['products'] = Product::where('id',$request['product_id'])->get();
        }

        // $data['product'] = Product::where('company_id',$request->company_id)->where('category_id', '=', NULL)->get();
        // dd($data['product']);
        $pdf = PDF::loadView('admin.pdf.stock-product-wise-report-pdf',$data);
        return $pdf->setPaper('a4')->stream('document.pdf'); 
    }


}
