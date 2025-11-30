<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class covers extends Model
{
     protected $fillable=[
        'logo_path',
        'user_id' , 
        'cover_path' ,
        'title',
        'subTitle',
        'description' 
    ];
}
