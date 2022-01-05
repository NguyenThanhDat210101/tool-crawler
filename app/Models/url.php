<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class url extends Model
{
   protected $guarded =[];

   public function card(){
    return $this->hasMany(card::class);
}
}
