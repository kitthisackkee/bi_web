<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalDoc extends Model
{
    use HasFactory;
    protected $fillable = ['date','doc_type','short_title','storage_file_id','file','user_id','branch_id','del'];

    public function doc_typename()
    {
        return $this->belongsTo('App\Models\DocType','doc_type','id');
    }
    public function storage_file_name()
    {
        return $this->belongsTo('App\Models\StorageFile','storage_file_id','id');
    }
    public function username()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function branchname()
    {
        return $this->belongsTo('App\Models\Branch','branch_id','id');
    }
}
