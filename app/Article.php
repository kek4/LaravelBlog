<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $table = "article";

    public static function visible($id, $visible){
      $vis = ($visible==1) ? 0 : 1 ;
      return DB::table('article')
                  ->where('id', $id)
                  ->update(['visibilite' => $vis]);
   }

   public static function articleAutCat($id){

    return DB::table('article')
                 ->join('user', 'user.id', '=', 'article.user_id')
                 ->join('categorie', 'categorie.id', '=', 'article.categorie_id')
                 ->select('article.*', 'categorie.titre as cat_titre','user.prenom as prenom')
                 ->where('article.id', '=', $id)
                 ->first();
                 ;
  }

   public static function position($id){

    return DB::table('article')
                 ->where('article.id', '<=', $id)
                 ->count();
                 ;
  }

}
