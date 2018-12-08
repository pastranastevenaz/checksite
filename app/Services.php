<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Website;

class Services extends Model
{

  public function user(){
    return $this->belongsTo('App\User', 'owner_id');
  }

  public function agent(){
    return $this->belongsTo('App\User', 'contractor_id');
  }

  public function website(){
    return $this->belongsTo('App\Website', 'website_id');
  }

}
