<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use Session;
use Auth;


class PanierController extends Controller
{
   //  public function panier(){
   //
   //    $panier = Article::whereIn('id', Session::get('like', []))->get();
   //    return view('panier',['panier' => $panier]);
   // }

    /**
    *
    */
    public function panier(Request $request){
      $somme = 0;
      foreach(session('like', []) as $key => $value){
         $somme +=  \App\Article::find($key)->prix;
      }
      //si on a soumi le formulaire
      if($request->isMethod('post')){
         //clef privée pour que mon serveur se connecte a mon compte stripe
        \Stripe\Stripe::setApiKey(" sk_test_dBTcaGCsis18ZLKc0NmN2pgE");
        //create a customer for Stripe
        $customer = \Stripe\Customer::create(array(
          "description" => Auth::user()->prenom." ".Auth::user()->nom,
          "email" => Auth::user()->email,
          "source" => $request->stripeToken // obtenu via l'étape précédente
        ));
        \Stripe\Charge::create([
          "amount" => ($somme +$somme * 0.20) * 100, // En centimes ! 20 € ici
          "currency" => "eur",
          "customer" => $customer->id //dynamique
       ]);
      }
      Session::flush();
      return view('panier', [
        "somme" => $somme
      ]);
    }
}
