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
}
