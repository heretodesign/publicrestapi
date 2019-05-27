<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = ['name', 'bid_price'];
  	protected $hidden = ['created_at', 'updated_at'];
}
