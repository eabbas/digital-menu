<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_item extends Model
{
    protected $fillable = [
        'title',
        'description',
        'parent_id',
        'menu_categories_id',
        'image',
        'customizable',
        'price',
        'discount'
    ];
    public function menu_category(){
        return $this->belongsTo(menu_category::class);
    }
    public function ingredients(){
        return $this->hasMany(ingredients::class)->chaperone();
    }
    public function menu_custom_ingredients(){
        return $this->hasMany(menu_custom_ingredients::class)->chaperone();
    }
}
