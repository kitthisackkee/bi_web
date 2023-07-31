<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportDoc extends Model
{
    use HasFactory;
    protected $fillable = ['doc_no','date','doc_type','short_title','external_parts_id',
        'storage_file_id','file','user_id','branch_id','showweb','del','created_at'];
    
    public function doc_typename()
    {
        return $this->belongsTo('App\Models\DocType','doc_type','id');
    }
    public function external_parts_name()
    {
        return $this->belongsTo('App\Models\ExternalParts','external_parts_id','id');
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
