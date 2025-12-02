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
     public function socialMedia(){
      return $this->belongsToMany(socialMedia::class,'social_addresses','socialMedia_id','covers_id');

    }
}
