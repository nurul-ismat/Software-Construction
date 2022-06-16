<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propertiescategories extends Model
{
    protected $fillable =['category_id'];
    protected $primaryKey = 'propertiescategories_id';

    public function categories() {
        return $this->belongsTo('App\Propertiescategories', 'category_id', 'propertiescategories_id'); 
    }
    
    public function childrenCategories() {
        return $this->hasMany('App\Propertiescategories', 'category_id', 'propertiescategories_id'); //get all subs. NOT RECURSIVE
    }

}
