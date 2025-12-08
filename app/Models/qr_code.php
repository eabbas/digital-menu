<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qr_code extends Model
{
    protected $fillable=[
        'qr_path',
        'menu_id',
        'career_id',
        'slug'
    ];
    public function menu(){
        return $this->belongsTo(menu::class);
    }
    public function orders()
    {
        return $this->hasMany(order::class)->chaperOne();
    }
    public function career(){
        return $this->belongsTo(career::class);
    }
}