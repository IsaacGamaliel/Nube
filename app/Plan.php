<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'description', 'plan_name', 'plan_description', 'plan_price', 'plan_type', 'btn_label', 'amount',
      ];
}
