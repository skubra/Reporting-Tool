<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorityGroup extends Model
{
    protected $fillable=[
    	'title'
    ];

    public function prohibited_reports(){
        return $this->belongsToMany('App\Report');
    }

}
