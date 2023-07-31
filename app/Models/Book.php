<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_type_id','term_id','name','file','image','status','note'];

    public function booktypename()
    {
        return $this->belongsTo('App\Models\BookType','book_type_id','id');
    }

    public function termname()
    {
        return $this->belongsTo('App\Models\Term','term_id','id');
    }
}
