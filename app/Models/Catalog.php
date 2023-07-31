<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    
    protected $fillable = ['parent_id','lft','rght','name','note','image'];
}
