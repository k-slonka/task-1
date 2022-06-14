<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * get user's swipes
     */
    public function swipes(){
        return $this->hasMany('App\Models\Swipe');
    }

    
    /**
     * get user's pairs
     */
    public function pairs(){
        return $this->hasMany('App\Models\Pairs');
    }
}
