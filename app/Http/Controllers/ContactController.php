<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Contact;

/**
 * un controller controle les données d'une ou plusieurs pages
 */
class ContactController extends Controller
{
   /**
    * 1 méthode de controller = 1 page
    * Page contact
    * @return [type] [description]
    */
    public function contact(Request $request){

      //récupérer mes données en post de ma requête
      // dump($request->nom, $request->email, $request->message);
      $validator = Validator::make($request->all(), [
         'nom' => 'required|regex:/[a-z\-\ ]{3,}/i',
         'email' => 'required|email',
         'site' => 'active_url|max:300',
         'sujet' => 'required|in:contact,article,acheter,manger,dormir',
         'message' => 'required|min:10|max:300',
         'cgu' => 'required',
         'genre' => 'required|in:homme,femme',
      ]);

      // Savoir si le formulaire a des erreurs et si il a été soumis
      if ($validator->fails() && $request->isMethod('post')) {
            return redirect()->route('contact')->withErrors($validator)->withInput();
        }elseif ($request->isMethod('post')) {
           //formulaire saisi et valide
           //enregistrement en BDD
           $contact = new Contact();
           $contact->nom = $request->nom;
           $contact->email = $request->email;
           $contact->site = $request->site;
           $contact->sujet = $request->sujet;
           $contact->message = $request->message;
           $contact->genre = $request->genre;
           $contact->save();
           return redirect()->route('contact')->with('success','Votre message a bien été envoyer');
        }

      return view('contact');
   }

}
