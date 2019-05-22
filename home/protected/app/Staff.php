<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    
    public function fields()
    {
    	return $this->belongsToMany(Field::class);
    }

    public function topics()
    {
    	return $this->belongsToMany(Topic::class);
    }
}
