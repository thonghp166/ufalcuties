<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    protected $fillable = [
    	'name',
    	'type',
    	'address',
    	'phone',
    	'website'
    ];

    public function staffs()
    {
    	return $this->hasMany(Staff::class);
    }
}
