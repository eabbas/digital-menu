<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class socialMedia extends Model
{
     protected $fillable=[
        'title',
        'link' , 
        'icon_path'  
    ];
}
