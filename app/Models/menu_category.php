<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'career_id'
    ];
    public function career(){
        return $this->belongsTo(career::class);
    }
    public function menu_items(){
        return $this->hasMany(menu_item::class)->chaperone();
    }
}
