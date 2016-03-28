<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','profile_id', 'username', 'email', 'password', 'active'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function profile()
    {
        return $this->belongsTo(UserProfile::class);
    }
    
    public function unidades()
    {
        return $this->hasOne(Unidade::class, 'tecnico_id');
    }
    
}
