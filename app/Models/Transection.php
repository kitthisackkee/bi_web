<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;
    protected $fillable = [
        'tran_no','date','acc_debit','acc_credit','des','debit','credit','accept_id',
        'status_acc_id','user_approved_id','branch_id',
        'user_id','role_id','created_at'];
    
    public function statusname()
    {
        return $this->belongsTo('App\Models\StatusAcc','status_acc_id','id');
    }
    public function approvedname()
    {
        return $this->belongsTo('App\Models\User','user_approved_id','id');
    }
    public function branchname()
    {
        return $this->belongsTo('App\Models\Branch','branch_id','id');
    }
    public function username()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function rolename()
    {
        return $this->belongsTo('App\Models\Role','role_id','id');
    }
}
