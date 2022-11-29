<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StuRegModel extends Model
{
    use HasFactory;  

    protected $table = 'students';
    protected $fillable = [
        'id',
    	'name',	
        'email',
        'roll_no',	
        'depatment',
        'semester',
        'gender',
        'password',
       'dob'
    ];
}
