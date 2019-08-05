<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $fillable = [

        'title',
        'description',
        'owner_id',
        'cat_id'

    ];
}
