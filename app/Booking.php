<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'id',
        'check_in',
        'check_out',
      	'arrival',
        'departure',
        'people',
        'pets',
        'price',
        'chalet'
      ]; 
}

