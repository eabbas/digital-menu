<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'cartNumber',
        'address_id',
        'user_id',
        'career_id'
    ];

    public function user(){
        return $this->belongsTo('User::class');
    }

    public function career(){
        return $this->belongsTo('career::class');
    }
}
