<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qr_code extends Model
{
    protected $fillable=['qr_path','career_id','is_main'];
    public function menu(){
        return $this->belongsTo(menu::class);
    }
}
