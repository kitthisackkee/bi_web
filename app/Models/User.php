<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','gender','name','lastname','birthday','phone','email','password','vl_id','dt_id','pv_id','last_vl_id','last_dt_id','last_pv_id','emp_id','term_id','classroom_id','role_id','branch_id','address','image','del'];

    public function empname()
    {
        return $this->belongsTo('App\Models\Employee','emp_id','id');
    }
    public function rolename()
    {
        return $this->belongsTo('App\Models\Role','role_id','id');
    }
    public function branchname()
    {
        return $this->belongsTo('App\Models\Branch','branch_id','id');
    }
    public function termname()
    {
        return $this->belongsTo('App\Models\Term','term_id','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
