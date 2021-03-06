<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    protected $dates = ['deleted_at'];

    use SoftDeletes;
    protected $fillable = ['title','content','category_id','featured',];

    public function getFeaturedAttribute($featured){
         return asset($featured);
    }




    public function postCategory(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
