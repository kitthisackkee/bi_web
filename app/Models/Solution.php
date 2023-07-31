<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    protected $fillable = ['image','name_la','name_en','short_des_la','short_des_en','des_la','des_en','solution_type_id','status'];

    public function solutionname()
    {
        return $this->belongsTo('App\Models\SolutionType','solution_type_id','id');
    }
}
