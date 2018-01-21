<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=[
    	'title'
    ];

    public function reports(){
    	return $this->hasMany('App\Report','menuid');
    }
}
