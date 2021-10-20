<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
    
   
}
