<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productcategories extends Model
{
    //
    protected $fillable = [
        'categories_name'
    ];

    public function addproducts()
    {
        return $this->hasMany('App\addproduct', 'id_categories', 'id');
    }
}
