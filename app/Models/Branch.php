<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['code','logo','name_la','name_en','phone','email','address_la','address_en','des_la','des_en','whatapps','fanpaege','youtube','google_map'
        ,'play_store','app_store','app_gallery','director_sign','chechker_sign','customer_sign','staff_sign','payment_logo','bill_header','bill_footer','status'];
}
