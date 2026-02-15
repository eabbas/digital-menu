<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
     protected $fillable=[
        'logo_path',
        'user_id' , 
        'cover_path' ,
        'title',
        'subTitle',
        'description',
    ];
     public function socialMedia(){
      return $this->belongsToMany(socialMedia::class,'social_addresses','page_id','socialMedia_id');

    }
    public function socialAddresses(){
      return $this->hasMany(social_address::class , 'page_id');
    }

    public function siteLinks(){
      return $this->hasMany(site_link::class , 'page_id');
    }
      public function social_qr_codes()
    {
        return $this->hasOne(social_qr_codes::class , 'page_id');
    }
     public function user()
    {
    return $this->belongsTo(User::class);
    }
}
