<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'banner',
        'qr_num',
        'career_id',
    ];

    public $timestamps = true;

    public function career()
    {
        return $this->belongsTo(career::class);
    }

    public function qr_codes()
    {
        return $this->hasMany(qr_code::class)->chaperone();
    }

    public function menu_categories(){
        return $this->hasMany(menu_category::class);
    }

}
