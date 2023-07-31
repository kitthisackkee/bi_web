<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['image','title_la','title_en','slug','des_la','des_en','status','user_id'];

    public function username()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
