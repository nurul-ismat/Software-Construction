<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model {
    protected $table = 'log_histories';
    public $timestamps = false;

    public function getuser() {
        return $this->hasOne( 'App\User', 'id', 'user_id' );
    }

}
