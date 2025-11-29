<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customCategory extends Model
{
    protected $fillable=[
        'title' , 
        'max_item_amount'
    ];
}
