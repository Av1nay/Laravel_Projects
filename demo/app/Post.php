<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //establish relationship with Post model 
    public function user(){
        return $this->belongsTo('App\User');
    }
}
