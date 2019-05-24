<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldStaff extends Model
{

    protected $table = 'field_staff';
    protected $fillable = [
    	'staff_id',
    	'field_id'
    ];
}
