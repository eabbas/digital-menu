<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class intro_category extends Model
{
    protected $fillable = ['title'];

    public function products(){
        return $this->belongsToMany(intro_product::class, 'intro_pro_cats');
    }
}
