<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qr_code extends Model
{
    protected $fillable=['qr_pass','career_id','is_main'];
}
