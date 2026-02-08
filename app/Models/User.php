<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phoneNumber',
        'password',
        'family',
        'main_image',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function careers(){
        return $this->hasMany(career::class)->chaperOne();
    }
    public function ecomms(){
        return $this->hasMany(ecomm::class)->chaperOne();
    }
    // public function ecomm_categories(){
    //     return $this->hasMany(ecomm_category::class)->chaperOne();
    // }
    public function role(){
      return $this->belongsToMany(role::class,'role_users');

    }
     public function ecomm_categories()
    {
        return $this->hasManyThrough(ecomm_category::class, ecomm::class,'user_id','ecomm_id');
    }
     public function pages(){
        return $this->hasMany(pages::class)->chaperOne();
    }
    public function qr_codes(){
        return $this->hasMany(qr_code::class);
    }
    public function menus(){
        return $this->hasMany(menu::class);
    }
    public function contactUs(){
        return $this->hasMany(contactUs::class);
    }
    public function carts(){
        return $this->hasMany(cart::class);
    }
    public function orders(){
        return $this->hasMany(order::class);
    }
    public function addresses(){
        return $this->hasMany(address::class);
    }

    public function customers(){
        return $this->hasMany(User::class, 'parent_id');
    }

    public function request(){
        return $this->hasOne(requests::class);
    }
}
