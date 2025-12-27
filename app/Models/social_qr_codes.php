<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class social_qr_codes extends Model
{
  protected $fillable = [
    'covers_id',
    'qr_path',
    'slug'
  ];

  public function covers()
  {
    return $this->belongsTo(Covers::class);
  }
}
