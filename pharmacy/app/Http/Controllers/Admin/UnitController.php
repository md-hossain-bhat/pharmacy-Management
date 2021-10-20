<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use Session;

class UnitController extends Controller
{
    public function units(){
        Session::put('page','units');
        $units = Unit::select('id','name')->get();
        return view('admin.units.units')->with(compact('units'));
    }



    public function AddEditUnit(Request $request, $id=null){
        if(Session::get('admiDetails')['moderator_acc']==0){
            return redirect('/admin/dashboard')->with("success_error","access denied !");
        }
        if ($id=="") {
            $title ="Add Strength";
            $unit = new Unit;
            $unitdata = array();
            $message ="Strength Add Successfully!";
        }else{
            $title ="Edit Strength";
            $unitdata = Unit::where('id',$id)->first();
            // $getCategories = json_decode(json_encode($getCategories),true);
            // echo "<pre>"; print_r($getCategories); die;
            $unit = Unit::find($id);
            $message ="Strength Update Successfully!";
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

        $unit->name     =$data['name'];
        $unit->save();

        Session::flash('success_message',$message);
        return redirect("admin/units");
    }
    $units = Unit::select('id','name')->get();
    return view('admin.units.add_edit_unit')->with(compact('title','units','unitdata'));
}

    public function deleteUnit($id){

        Unit::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Strength has been deleted Successfully!");
    }
}
