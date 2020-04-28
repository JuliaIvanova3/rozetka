<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function section()
    {
        return $this->hasMany('App\Product');
    }
}
