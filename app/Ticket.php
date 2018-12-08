<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public function website(){
      return $this->belongsTo('App\Website', 'website_id');
    }

    public function user(){
      return $this->belongsTo('App\User', 'user_id');
    }
}
