<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class social_address extends Model
{
    protected $fillable=[
        'socialMedia_id',
        'user_id' , 
        'username' ,
        'covers_id' 
    ];
     public function socialMedia()
    {
        return $this->belongsTo(socialMedia::class);
    }
}
