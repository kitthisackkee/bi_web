<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','dis_id','pro_id'];

    public function disname()
    {
        return $this->belongsTo('App\Models\District','dis_id','id');
    }
    public function proname()
    {
        return $this->belongsTo('App\Models\Province','pro_id','id');
    }
}
