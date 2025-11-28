<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class custom_product_material extends Model
{
    protected $fillable=[
        'title' , 
        'description' ,
        'price_per_unit' ,
        'category_name' ,
        'image' ,
        'required' , 
        'order' ,
        'category_limit' ,
        'unit_limit' ,
        'custom_product_id'
    ];
    public function custom_product()
    {
        return $this->belongsTo(custom_product::class);
    }
}
