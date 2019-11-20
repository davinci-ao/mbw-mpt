<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chalet extends Model
{
    protected $fillable = [
        'id',
        'holidaypark_id',
      	'name',
      	'description',
        'price',
        'country',
        'housenr',
        'addition',
        'street',
        'place',
        'longitude',
        'latitude'
      ];
      
      public function chalet()
      {
        return $this->belongsTo('App\Holidaypark');
      }
}
