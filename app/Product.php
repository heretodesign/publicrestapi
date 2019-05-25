<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $fillable = ['seller_name', 'weight', 'country_of_origin', 'harvesting_date', 'cultivar', 'auction'];
  protected $hidden = ['created_at', 'updated_at'];


  public function updateMe($attributes)
  {
      if (array_has($attributes, 'seller_name')) {
          $this->seller_name = array_get($attributes,'seller_name');
      }

      if (array_has($attributes, 'weight')) {
          $this->weight = array_get($attributes,'weight');
      }

      if (array_has($attributes, 'country_of_origin')) {
          $this->country_of_origin = array_get($attributes,'country_of_origin');
      }

      if (array_has($attributes, 'harvesting_date')) {
          $this->harvesting_date = array_get($attributes,'harvesting_date');
      }

      if (array_has($attributes, 'cultivar')) {
          $this->cultivar = array_get($attributes,'cultivar');
      }

      if (array_has($attributes, 'auction')) {
          $this->auction = array_get($attributes,'auction');
      }

      $this->save();
  }
}

