<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "media";
    public $timestamps = false;

    public static function getNumberMediaVisible($visibilite){

      // '=' par defaut dans le where
     return Media::join('article_media', 'media.id', '=', 'article_media.media_id')
                  ->groupBy('article_media.media_id')
                  ->get()
                  ->count();

 }


 public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}
