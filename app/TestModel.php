<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $fillable = [
        'name', 'surname', 'age'
    ];

}
