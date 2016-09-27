<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tchat;

class TchatController extends Controller
{
   /**
    * add Tchat message in database
    * @param Request $request [description]
    */
    public function add(Request $request){

      if ($request->content != '') {
         $tchat = new Tchat();
         $tchat->content = $request->content;
         $tchat->save();
      }


   }
}
