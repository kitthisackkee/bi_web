<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','pro_id','del','created_at'];

    public function proname()
    {
        return $this->belongsTo('App\Models\Province','pro_id','id');
    }
}
