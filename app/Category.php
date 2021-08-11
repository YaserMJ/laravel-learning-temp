<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    public function posts()
    {

        //hasOne , hasMany,belongsTo, belongsToMany
        return $this->hasMany(Post::class);
    }
}
