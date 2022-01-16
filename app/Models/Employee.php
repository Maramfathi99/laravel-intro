<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='employess';

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'gender',
        'empno',
        'department_id',
        'image'
    ];
    
    
   public function department()
    {
        return $this->belongsTo(Department::class);
        }
    }
