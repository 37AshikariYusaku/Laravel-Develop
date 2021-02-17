<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    
    protected $guarded = array('id');
    
    public static $rules = array(
    	'brand' => 'required',
    	'title' => 'required',
    	'review' => 'required', 
    	);
    	
	public function histories() {
	    return $this->hasMany('App\History');
	}
}
