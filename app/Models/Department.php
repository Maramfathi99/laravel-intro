<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	use HasFactory;
	protected $table='departments';

	protected $fillable = [
		'name',
		'department_id'
	];
	public function employess(){
		return $this->hasMany(Employee::class);
	}
}
