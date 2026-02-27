<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class intro_product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'main_image',
    ];

    public function categories(){
        return $this->belongsToMany(intro_category::class, 'intro_pro_cats');
    }

    public function gallery(){
        return $this->hasMany(intro_product_gallery::class);
    }

    public function attributes(){
        return $this->hasMany(intro_product_attribute::class);
    }
}
