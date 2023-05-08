<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Cviebrock\EloquentSluggable\Sluggable;


class User extends Authenticable implements JWTSubject
{
    use HasFactory;
    use Sluggable;

    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }

    protected $fillable = [
        'name', 'email', 'password','userType','username','passwordToken',
        'isActive', 'token_expired_at'
    ];
    
    public function setPasswordAttribute($password){
        if ( $password !== null ) {
            if ( is_null(request()->bcrypt) ) {
                $this->attributes['password'] = bcrypt($password);
            } else {
                $this->attributes['password'] = $password;
            }
        }
    }

    public function sluggable(): array
    {
        return [
            'username' => [
                'source' => 'name'
            ]
        ];
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
