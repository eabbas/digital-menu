<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class career extends Model
{
  protected $fillable = ['logo', 'title', 'province', 'city', 'address', 'qrCode', 'email', 'description', 'user_id'];

  public $timestamps = true;
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function menus()
  {
    return $this->hasMany(menu::class)->chaperOne();
  }
}
