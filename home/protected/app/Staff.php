<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $fillable = [
    	'name',
        'user_id',
        'code', 
       	'account', 
        'vnu_email',
        'gmail',
        'staff_type',
        'degree',
        'work_unit',
        'phone',
        'website',
        'address'
    ];
    
    public function fields()
    {
    	return $this->belongsToMany(Field::class);
    }

    public function topics()
    {
    	return $this->hasMany('App\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
