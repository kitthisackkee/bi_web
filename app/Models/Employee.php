<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['id','firstname','lastname','sex','bod','bvill_id','bdis_id','bpro_id',
        'address','vill_id','dis_id','pro_id','phone','pos_id','dpart_id','start_date','end_date',
        'mar_id','mar_name','mar_work','mar_address','mar_phone','note','picture','file','user_id','del','status','created_at','updated_at'];

    public function bvillname()
    {
        return $this->belongsTo('App\Models\Village','bvill_id','id');
    }
    public function bdisname()
    {
        return $this->belongsTo('App\Models\District','bdis_id','id');
    }
    public function bproname()
    {
        return $this->belongsTo('App\Models\Province','bpro_id','id');
    }
    public function villname()
    {
        return $this->belongsTo('App\Models\Village','vill_id','id');
    }
    public function disname()
    {
        return $this->belongsTo('App\Models\District','dis_id','id');
    }
    public function proname()
    {
        return $this->belongsTo('App\Models\Province','pro_id','id');
    }
    public function posname()
    {
        return $this->belongsTo('App\Models\Position','pos_id','id');
    }
    public function departname()
    {
        return $this->belongsTo('App\Models\Department','dpart_id','id');
    }
    public function marname()
    {
        return $this->belongsTo('App\Models\Marries','mar_id','id');
    }
}
