<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['image','icon','name_la','name_en','short_des_la','short_des_en','des_la','des_en','status'];
}
