<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['image','news_type_id','name_la','name_en','short_des_la','short_des_en','des_la','des_en','status','user_id'];

    public function newstype()
    {
        return $this->belongsTo('App\Models\SolutionType','news_type_id','id');
    }

    public function username()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
