<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormParam extends Model
{
    protected $fillable=[
    	'label', 'type', 'name'
    ];

    public function reports(){
    	return $this->belongsToMany('App\Report');
    }

}
