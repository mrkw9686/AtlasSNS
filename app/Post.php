<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

public function user() { //1対多の「１」側なので単数系
        return $this->belongsTo('App\User');
    }

}
