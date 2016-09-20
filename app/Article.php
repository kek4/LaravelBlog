<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $table = "article";

    /**
     * Change la visibilité d'un article
     * @param  [type] $id      [description]
     * @param  [type] $visible [description]
     * @return [type]          [description]
     */
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

  }

   public static function position($id){

    return DB::table('article')
                 ->where('article.id', '<=', $id)
                 ->count();

  }

   public static function getNumberArticleVisible($visibilite){

      // '=' par defaut dans le where
    return Article::where('article.visibilite', $visibilite)
                 ->count();

  }

   public static function getNumberCatWithArt(){

      // '=' par defaut dans le where
    return Article::groupBy('categorie_id')
                 ->get()
                 ->count();
  }

   public static function getArtByCat(){

    return Article::select(DB::raw('COUNT(article.id) as value'), 'categorie.titre as label')
                  ->join('categorie', 'categorie.id','=', 'article.id')
                  ->groupBy('categorie_id')
                 ->get();
  }

   public static function getArtByCom(){

    return Article::select(DB::raw('COUNT(comment.id) as value'), 'article.titre as label')
                  ->join('comment', 'article.id','=', 'comment.article_id')
                  ->groupBy('comment.article_id')
                 ->get();
  }





}
