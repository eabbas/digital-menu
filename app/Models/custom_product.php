<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class custom_product extends Model
{
    protected $fillable=[
        'title' , 
        'description' ,
        'duration' ,
        'image' ,
        'material_limit' , 
        'min_amount_unit'
    ];

    public function custom_product_materials()
    {
        return $this->hasMany(custom_product_material::class)->chaperOne();
    }
    public function custom_product_variants()
    {
        return $this->hasMany(custom_product_variant::class)->chaperOne();
    }
}
