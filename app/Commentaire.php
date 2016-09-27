<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commentaire extends Model
{
     protected $table = "comment";

     public static function listCommentaire(){

      return DB::table('comment')
                   ->join('user', 'user.id', '=', 'comment.user_id')
                   ->join('article', 'article.id', '=', 'comment.article_id')
                   ->select('comment.id','comment.content','comment.note','comment.etat','comment.created_at as created', 'user.prenom', 'article.titre')
                   ->groupBy('comment.id')
                   ->get();
                   ;
    }

    public static function etat($id, $etat){

         return DB::table('commentaire')
                     ->where('id', $id)
                     ->update(['etat' => $etat]);

    }

    public static function getNumberComActif($etat){

      // '=' par defaut dans le where
    return Commentaire::where('comment.etat', $etat)
                  ->count();

  }

   public static function getComByYear($year){

   // return Commentaire::select(DB::raw('COUNT(id) as value'), DB::raw('YEAR(created_at) as year'))
   //               ->where(DB::raw('YEAR(created_at)'), '>', DB::raw('YEAR(NOW())-5'))
   //               ->groupBy(DB::raw('YEAR(created_at)'))
   //              ->get();

      return Commentaire::whereYear('created_at', '=', $year)
                        ->count();
            }

   public static function getComByArt($id, $take){

    return Commentaire::select('comment.*', 'user.nom as nom', 'user.prenom as prenom', 'user.avatar as avatar')
                  ->join('user', 'comment.user_id', '=', 'user.id')
                  ->where('comment.article_id', '=', $id)
                  ->take($take)
                  ->orderBy('id','desc')
                 ->get();
  }

   public static function getNumberComByArt($id){

    return Commentaire::select('comment.*')
                  ->where('comment.article_id', '=', $id)
                 ->count();
  }
}
