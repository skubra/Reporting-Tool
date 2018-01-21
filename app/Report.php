<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'menuid', 'title', 'dbquery', 'group'
    ];

    public function params(){
    	return $this->belongsToMany('App\FormParam');
    }

    public function menu(){
        return $this->belongsTo('App\Menu','menuid');
    }

    public function group(){
        return $this->belongsToMany('App\AuthorityGroup');
    }
}
