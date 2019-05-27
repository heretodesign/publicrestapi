<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    //
  protected $fillable = ['price', 'start_date', 'duration'];
  protected $hidden = ['created_at', 'updated_at'];


  public function updateMe($attributes)
  {
      if (array_has($attributes, 'price')) {
          $this->price = array_get($attributes,'price');
      }

      if (array_has($attributes, 'start_date')) {
          $this->start_date = array_get($attributes,'start_date');
      }

      if (array_has($attributes, 'duration')) {
          $this->duration = array_get($attributes,'duration');
      }

      $this->save();
  }

  public function product()
  {
      return $this->belongsTo('App\Product', 'foreign_key');
  }
}
