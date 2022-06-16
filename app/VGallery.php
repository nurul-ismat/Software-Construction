<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VGallery extends Model
{

    protected $table = "vgalleries";

    public function videos()
    {
        return $this->hasMany('App\GalleryVideos', 'vgallery_id', 'id');
    }
}
