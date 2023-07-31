<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['image','name_la','name_en','customer_type_id'];

    public function customertypename()
    {
        return $this->belongsTo('App\Models\CustomerType','customer_type_id','id');
    }
}
