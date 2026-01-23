<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable=[
        'career_id',
        'slug',
        'menu_item_id',
        'user_id',
        'quantity',
        'status',
    ];
    public function careers()
    {
        return $this->belongsTo(career::class);
    }
    public function qr_code()
    {
        return $this->belongsTo(qr_code::class);
    }
    public function menu_item()
    {
        return $this->belongsTo(menu_item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
