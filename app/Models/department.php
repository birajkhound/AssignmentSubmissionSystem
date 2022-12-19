<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StuRegModel;
class department extends Model
{
    use HasFactory;
    protected $table = 'department';
    protected $fillable = [
        'd_id',
    	'd_name'
    ];

    public function getDep(){
        return $this->hasMany(StuRegModel::class,'d_id','d_id');
    }
}
