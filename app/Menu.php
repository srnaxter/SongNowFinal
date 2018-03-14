<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
