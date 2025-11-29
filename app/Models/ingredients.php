<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingredients extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price_per_unit',
        'image',
        'menu_item_id'
    ];
    public function menu_item(){
        return $this->belongsTo(menu_item::class);
    }
}
