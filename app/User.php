<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use App\Services;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // creating a relationship
    public function posts(){
        // A User, has many posts
        return $this->hasMany('App\Post');
    }

    public function services(){
        return $this->hasMany('App\Services');
    }


    public function website(){
      return $this->hasMany('App\Website');
    }

    public function ticket(){
      return $this->hasMany('App\Ticket');
    }
}
