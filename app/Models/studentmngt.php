<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentmngt extends Model
{
    Use Has Factory;
    protected $table = 'stud_tbl';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fname',
        'lname',
        'address',
        'dob',
    ];
    
}
