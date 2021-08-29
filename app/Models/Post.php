<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Table Name  Tis is all optional
    protected $table = 'posts';  // %table assumed to be plural of Model name.
    //can change here if different
    //Primary Key
    public $primaryKey = 'id';
    // $timestamp
    public $timestamps = 'true';
    //endOptional

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
