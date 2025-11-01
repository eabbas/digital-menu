<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = ['page_date', 'qr_num', 'career_id'];

    public function career()
    {
        return $this->belongsTo(career::class);
    }
}
