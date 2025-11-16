<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class career extends Model
{
  protected $fillable = ['logo', 'title', 'province', 'city', 'address',  'email', 'description', 'user_id'];

  public $timestamps = true;
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function menu()
  {
    return $this->hasOne(menu::class)->chaperOne();
  }

  public function careerCategory()
  {
    return $this->belongsTo(careerCategory::class);
  }
}
