<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  // Table name posts
  protected $table = 'posts';
  // Primary Key
  public $primaryKey = 'id';
  // Timerstamps
  public $timestamps = true;



  // Creating a relationship
  public function user(){
    // a single post belongs to a user
    return $this->belongsTo('App\User');
  }
}
