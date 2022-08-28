<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchaselog extends Model
{
    //
    protected $fillable = [
        'proof',
    ];

    public function details()
    {
        return $this->hasMany('App\detail', 'id_addproducts', 'id');
    }
    public function addproducts()
    {
        return $this->belongsTo('App\addproduct', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'id_users');
    }
}
