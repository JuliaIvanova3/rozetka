<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'section_id'];

    public function Category()
    {
        return $this->hasMany('App\Category');
    }
}
