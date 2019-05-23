<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'field';

    public function staffs()
    {
    	return $this-> belongsToMany(Staff::class);
    }
    
}
