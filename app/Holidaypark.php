<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holidaypark extends Model
{
    protected $fillable = [
        'id',
      	'holidaypark_name',
        'description',
        'chalet'  
      ]; 

      public function holidayparks() 
      {
        return $this->hasMany('App\Chalet');
      }
}
