<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holidaypark extends Model
{
    protected $fillable = [
        'id',
      	'name',
        'description',
        'chalet'  
      ]; 
}
