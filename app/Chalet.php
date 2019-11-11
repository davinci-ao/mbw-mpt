<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chalet extends Model
{
    protected $fillable = [
        'id',
      	'name',
      	'description',
      	'price'
      ];    
}
