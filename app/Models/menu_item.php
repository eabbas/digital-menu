<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_item extends Model
{
    protected $fillable = [
        'title',
        'description',
        'parent_id',
        'menu_category_id',
        'image',
        'customizable',
        'price',
        'discount',
        'duration'
    ];
    public function menu_category(){
        return $this->belongsTo(menu_category::class);
    }
    public function ingredients(){
        return $this->hasMany(ingredients::class);
    }
    public function menu_custom_ingredients(){
        return $this->hasMany(menu_custom_ingredients::class);
    }
    public function orders(){
        return $this->hasMany(order::class);
    }
}
