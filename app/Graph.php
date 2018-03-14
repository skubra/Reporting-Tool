<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    protected $fillable = [
        'type', 'title', 'x_axis_title', 'x_axis_title', 'x_axis_title', 'x_axis_title'
    ];

    public function report(){
        return $this->belongsToMany('App\Report');
    }

}
