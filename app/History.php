<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $guqrded = array('id');
    
    public static $rules = array(
    	'review_id' => 'required',
    	'edited_at' => 'required');
}