<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model {

    public function toogle_status() {

        if ( $this->status != 1 ) {
            $this->status = 1;
        } else {
            $this->status = 0;
        }

        $this->save();
    }

    public function cat()
    {
        return $this->hasOne('App\Propertiescategories', 'propertiescategories_id', 'sub_category');
    }

    public function showreq()
    {
        return $this->hasMany('App\ShowReq', 'property_id');
    }

   public function user()
   {
       return $this->belongsTo('App\User', 'added_by', 'id');
   }

   public function location()
   {
       return $this->hasMany('App\PropertyLocation', 'property_id');
   }

}
