<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Product;
use App\Models\Profile;

class User extends Authenticatable implements JWTSubject {

    use Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'id_profile',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function relProducts () {
        return $this->hasMany(Product::class, 'id_user');
    }

    public function relProfile () {
        return $this->hasOne(Profile::class, 'id', 'id_profile');
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [
            'id' => $this->id
         ];
    }

    public function setPasswordAttribute($password) {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
