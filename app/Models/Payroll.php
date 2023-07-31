<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = ['id','emp_id','month','year','salary','bonus','overtime','total','note','user_id','del','created_at'];

    public function employee_name()
    {
        return $this->belongsTo('App\Models\Employee','emp_id','id');
    }
    public function statusname()
    {
        return $this->belongsTo('App\Models\StatusAcc','status_acc_id','id');
    }
}
