<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name posts
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timerstamps
    public $timestamps = true;
}
