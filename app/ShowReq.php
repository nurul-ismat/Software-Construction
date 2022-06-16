<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowReq extends Model {

    public function property() {
        return $this->hasOne( 'App\Properties', 'id', 'property_id' );
    }

    public function ToogleStatus() {
        if ( $this->status == 1 ) {
            $this->status = 0;
        } else {
            $this->status = 1;
        }
        $this->save();
    }

}
