<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'price', 'image', 'category_id'];

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function category() 
    {
        return $this->belongTo('App\Category');
    }

}
