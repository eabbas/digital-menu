<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class site_link extends Model
{
    protected $fillable=[
        'address',
        'user_id' , 
        'title' ,
        // 'icon_path',
        'covers_id', 
    ];

    public function cover(){
        return $this->belongsTo(covers::class);
    }
}
