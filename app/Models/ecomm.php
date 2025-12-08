<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ecomm extends Model
{
     protected $fillable = ['logo', 'banner','description', 'title', 'province', 'city', 'address','user_id','email','social_media'];

  public $timestamps = true;
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function ecomm_category()
  {
    return $this->hasMany(ecomm_category::class)->chaperOne();
  }
  public function ecomm_product()
  {
    return $this->hasMany(ecomm_product::class)->chaperOne();
  }
 
//   public function menu()
//   {
//     return $this->hasOne(menu::class)->chaperOne();
//   }
 
}
