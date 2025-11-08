<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable=[
        'career_id' ,
        'slug' ,
        'title' ,
        'count'
    ];
    public function careers()
    {
        return $this->belongsTo(career::class);
    }
    public function qr_code()
    {
        return $this->belongsTo(qr_code::class);
    }
}
