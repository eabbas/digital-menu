<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class custom_product_variant extends Model
{
    protected $fillable=[
        'title' ,
        'description' ,
        'custom_product_id' ,
        'min_amount_unit'
    ];
    public function custom_product()
    {
        return $this->belongsTo(custom_product::class);
    }
}
