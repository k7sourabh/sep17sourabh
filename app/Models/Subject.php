<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table ='subjects'; 
    protected $fillable = ['user_id','name','marks_scored','grade'];
    
    function User()
    {
        return $this->belongsTo(User::class);
    }
    
}
