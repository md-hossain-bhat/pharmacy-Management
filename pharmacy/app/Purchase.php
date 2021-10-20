<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id')->select('id','name');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id')->select('id','product_name','quantity','unit_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
   

}
