<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function postCategory(){
        return $this->belongsTo('App\Category');
    }
}
