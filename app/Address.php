<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    // public $table = "address";
    public function owner(){
      return $this->belongsTo('App\User', 'owner_id');
    }
}
