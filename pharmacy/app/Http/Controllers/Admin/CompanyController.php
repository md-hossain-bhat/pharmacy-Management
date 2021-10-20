<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use Session;
use Auth;

class CompanyController extends Controller
{
    public function companies(){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        Session::put('page','companies');
        $companies = Company::select('id','name')->get();
        return view('admin.companies.companies')->with(compact('companies'));
    }


    public function AddEditCompany(Request $request, $id=null){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        if ($id=="") {
            $title ="Add Company";
            $company = new Company;
            $companydata = array();
            $message ="Company Add Successfully!";
        }else{
            $title ="Edit Company";
            $companydata = Company::where('id',$id)->first();
            // $getCategories = json_decode(json_encode($getCategories),true);
            // echo "<pre>"; print_r($getCategories); die;
            $company = Company::find($id);
            $message ="Company Update Successfully!";
        }
    if ($request->isMethod('post')) {
        $data = $request->all();
    // echo "<pre>"; print_r($data); die;
        $rulse = [
            'name' => 'required',
        ];

        $customMessage = [
            'name.required' =>'name is required',
        ];
        $this->validate($request,$rulse,$customMessage);

        $company->name     =$data['name'];
        $company->save();

        Session::flash('success_message',$message);
        return redirect("admin/companies");
    }
    $companies = Company::select('id','name')->get();
    return view('admin.companies.add_edit_company')->with(compact('title','companies','companydata'));
}

    public function deleteCompany($id){

        Company::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Company has been deleted Successfully!");
    }
}
