<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Services extends Model
{

  public function client(){
    return $this->belongsTo('App\User', 'owner_id');
  }

  public function agent(){
    return $this->belongsTo('App\User', 'contractor_id');
  }
}
