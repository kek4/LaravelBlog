<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Page;
use App\Media;
use Carbon\Carbon;
use Validator;

class MediaController extends Controller
{
   public function media(Request $request){

      $titres = Page::all();


      $validator = Validator::make($request->all(), [
         'titre' => 'required|regex:/[a-z\-\ ]{3,}/i|unique:media',
         // regex avec certains caracteres: utiliser comme tableau avec []
         'url' => ['required','active_url','regex:/^http(s)?\:\/\/(www.)?(youtube.com\/watch\?|vimeo.com|dailymotion.com\/video\/)[a-zA-Z0-9\/\?\-\_\=\+\(\)\&\$\€\^]{1,}$/'],
         'page' => 'required|exists:page,id',
         'date' => 'required|date_format:d-m-Y|after:today',
      ],[
         'required' => 'Le champ :attribute est requis',
         'titre.regex' => "Le titre n'est pas valide",
         'titre.unique' => "Ce titre existe déjà",
         'date_format' => "Le format de date doit être dd-mm-aaaa",
         'after' => "La date doit être supérieur ou égal à aujourd'hui",
      ]);

      if ($validator->fails() && $request->isMethod('post')) {
            return redirect()->route('media', ['titres' => $titres])->withErrors($validator)->withInput();
       }elseif ($request->isMethod('post')) {
           //formulaire saisi et valide
           //enregistrement en BDD
           $visibilite = ($request->visibilite == 1) ? 1 : 0 ;
         //   $dateFormat = \DateTime::createFromFormat('d-m-Y', $request->date);

           $media = new Media();

           $media->titre = $request->titre;
           $media->page_id = $request->page;
           $media->video = $request->url;
           $media->visibilite = $visibilite;
           $media->date_activation = Carbon::parse($request->date);
           $media->date_creation = new \DateTime();
           $media->save();
           return redirect()->route('media', ['titres' => $titres])->with('success','Votre vidéo a bien été envoyer');
       }



      return view('media', ['titres' => $titres]);

   }
}
