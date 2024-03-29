<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topic';

    protected $fillable = [
    	'name',
        'detail',
        'staff_id'
    ];

    public function staff()
    {
    	return $this->belongsTo('App\Staff');
    }
}
