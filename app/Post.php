<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    // use HasFactory;
    protected $guarded  = ['id'];
    // protected $fillable = ['title','excerpt','body'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {

        //hasOne , hasMany,belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
