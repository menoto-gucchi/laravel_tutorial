<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['user_id','title','comp_cls','time_limit','priority_cls','description'];
}
