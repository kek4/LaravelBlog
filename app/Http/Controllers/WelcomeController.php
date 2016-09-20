<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;
use App\Media;
use App\Commentaire;

class WelcomeController extends Controller
{

    public function welcome() {

      $nbArticles = Article::getNumberArticleVisible(1);
      $nbMedia = Media::getNumberMediaVisible(1);
      // dump(Media::has('articles')->count());exit;
      $nbCatWithArt = Article::getNumberCatWithArt();
      $nbComActif = Commentaire::getNumberComActif(2);

      return view('welcome', ['nbArticles' => $nbArticles,
                              'nbCatWithArt' => $nbCatWithArt,
                              'nbMedia' => $nbMedia,
                              'nbComActif' => $nbComActif]);
   }

   /**
    * Retourne du Json
    * @return [type] [description]
    */
   public static function statsCategories(){
      $nbCat = Article::getArtByCat();
      foreach ($nbCat as $key => $value) {
         $nbCat[$key]['value'] = (int) $nbCat[$key]['value']; // (int) caster une chaine en nombre
      }
      return $nbCat->toJson();
   }

   public static function statsArticles(){
      $nbComArt = Article::getArtByCom();
      foreach ($nbComArt as $key => $value) {
         $nbComArt[$key]['value'] = (int) $nbComArt[$key]['value']; // (int) caster une chaine en nombre
      }
      return $nbComArt->toJson();
   }

   public static function comsArticles(){
      // $nbComByYear = Commentaire::getComByYear();
      // foreach ($nbComByYear as $key => $value) {
      //    $nbComByYear[$key]['value'] = (int) $nbComByYear[$key]['value']; // (int) caster une chaine en nombre
      // }
      // return $nbComByYear->toJson();

         $datas = [];

         for ($i=date('Y')-4; $i <= date('Y'); $i++) {
            $datas[] = [
               'value' => Commentaire::getComByYear($i),
               'year' => (string) $i,
            ];
         }
         return $datas;

   }
}
