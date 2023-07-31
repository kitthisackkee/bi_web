<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marries extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','del','created_ad'];
}
