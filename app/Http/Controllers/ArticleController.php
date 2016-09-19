<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Pagination\Paginator;


class ArticleController extends Controller
{
   public function listArticle(){

      // envoyer en pagination pour récupérer la page courante

      $articles = Article::all();
      //transporteur c'est un tableau de données du controleur a la vue
      return view('article/list',['articles' => $articles]);
   }


   // on récupere les valeur en get qu'on a passer ds la route
   public function visible($id, $visible){
      $vis = ($visible==1) ? 0 : 1 ;

      // $art = Article::find($id);
      // $art->visibilite = $vis;
      // $art->save();

      Article::visible($id, $visible);

      $articles = Article::all();
      $msg = ($visible==1) ? "n'est maintenant plus visible" : "est maintenant visibible" ;
      return redirect()->route('artlist',['articles' => $articles])->with('success','Cet article '.$msg);
   }

   public function delete(Article $id){

      $id->delete();

      $articles = Article::all();
      return redirect()->route('artlist',['articles' => $articles])->with('success','Article supprimé');
   }

   /**
    * Récupère l'id de l'article et la page sur laquelle il s'affiche sous la forme d'une request
    * On initialise la variable avec la page de la requête et par défaut on affiche la page 1
    * Ensuite on initialise la page courante avec currentPageResolver
    * On fait une pagination page par page avec 1 en argument
    * et on envoie la vue avec le détail de l'article et la page
    * @param  [type]  $id      [description]
    * @param  Request $request [description]
    * @return [type]           [description]
    */
   public function voir($id = null, Request $request){
      $page = $request->page;
      if(!$page){
         $page = 1;
      }

      Paginator::currentPageResolver(function () use ($page) {
      return $page;
      });

      $articles = DB::table('article')->paginate(1);

      return view('article/voir',
      ['articles' => $articles,
      "page" => $page]
   );
   }

   public function pdf($id){

      $article = Article::articleAutCat($id);

      // return \PDF::loadFile('resources/views/article/voir.blade.html')->save('{{asset("PDF/pdf.pdf")}}')->stream('download.pdf');
      $pdf = \PDF::loadHTML(' <table>
                              	<tr>
                              		<td>Titre</td>
                              		<td>'.$article->titre.'</td>
                              	</tr>
                              	<tr>
                              		<td>Créer par</td>
                              		<td>'.$article->prenom.'</td>
                              	</tr>
                              	<tr>
                              		<td>Catégorie</td>
                              		<td>'.$article->cat_titre.'</td>
                              	</tr>
                              	<tr>
                              		<td>Résumé</td>
                              		<td>'.$article->resume.'</td>
                              	</tr>
                              	<tr>
                              		<td>Description</td>
                              		<td>'.$article->description.'</td>
                              	</tr>
                              	<tr>
                              		<td>Image</td>
                              		<td><img style="height:50%;width: auto;"
                                    src="'.$article->image.'" alt="" /></td>
                              	</tr>
                              	<tr>
                              		<td>Note</td>
                              		<td>'.$article->note.'</td>
                              	</tr>
                              	<tr>
                              		<td>Année publication</td>
                              		<td>'.$article->date_publication.'</td>
                              	</tr>
                              	<tr>
                              		<td>Date de création</td>
                              		<td>'.$article->created_at.'</td>
                              	</tr>
                              	<tr>
                              		<td>Date de modification</td>
                              		<td>'.$article->updated_at.'</td>
                              	</tr>
                              </table>');
              return $pdf->stream();
   }

   public function like($id, Request $request){

      $articles = Article::all();
      if (!$request->session()->has('like')) {
         $arrayLike = [];
         // foreach ($articles as $article) {
         //    $arrayLike[$article->id]['like'] = false;
         //    $arrayLike[$article->id]['titre'] = $article->titre;
         // }
         $request->session()->put('like', $arrayLike);
      }else{
      $arrayLike = $request->session()->get('like');
      }
      //ou $arrayLike = session('like', []);
      if (in_array($id, $arrayLike)) {
         array_push($id, $arrayLike);
         $comment = "Article ajouté en favoris";
      }else{
         unset($arrayLike[$id]);
         $comment = "Article supprimé des favoris";
      }
      $request->session()->put('like', $arrayLike);
      dump($request->session());
      exit();


      return redirect()->route('artlist',['articles' => $articles])->with('success',$comment);

   }






}
