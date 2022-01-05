<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_url extends Model
{
    protected $guarded =[];

    public function url(){
        return $this->belongsTo(url::class,'url_id','id');
    }
}
