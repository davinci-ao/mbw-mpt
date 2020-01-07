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
        'characteristics',
        'price',
        'country',
        'housenr',
        'addition',
        'street',
        'place',
        'longitude',
        'latitude',
        'photo1',
        'photo2',
        'photo3',
        'photo4'
      ];
      
      public function chalet()
      {
        return $this->belongsTo('App\Holidaypark');
      }
}
