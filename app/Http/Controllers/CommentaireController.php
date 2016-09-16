<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commentaire;

class CommentaireController extends Controller
{
   public function listCommentaire(){

      $commentaires = Commentaire::listCommentaire();
      //transporteur c'est un tableau de données du controleur a la vue
      return view('commentaire/list',['commentaires' => $commentaires]);
   }

   public function delete($id){

      Commentaire::where('id', $id)->delete();;

      $commentaires = Commentaire::all();
      return redirect()->route('list',['commentaires' => $commentaires])->with('success','Commentaire supprimé');
   }

   public function etat($id, $etat){

   Commentaire::etat($id, $etat);
   switch ($etat) {
      case '0': $comment = "Commentaire envoyé à la poubelle";
         break;
      case '1': $comment = "Commentaire en attente de modération";
         break;
      case '2': $comment = "Commentaire en ligne";
         break;
   }
   return redirect()->route('list',['commentaires' => $commentaires])->with('success',$comment);

   }
}
