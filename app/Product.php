<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'type','description','price','image'];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
