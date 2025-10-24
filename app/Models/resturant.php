<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resturant extends Model
{
  protected $fillable=['logo','name','province','city','address','qrCode','phone_number','email'];

  
}
