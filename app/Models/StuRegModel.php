<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\department;
class StuRegModel extends Model
{
    use HasFactory;  

    protected $table = 'students';
    protected $fillable = [
        'id',
    	'name',	
        'email',
        'roll_no',	
        'd_id',
        'semester',
        'gender',
        'address',
        'password',
        'dob'
    ];

    public function getDName(){
        return $this->belongsTo(department::class);
    }
}
