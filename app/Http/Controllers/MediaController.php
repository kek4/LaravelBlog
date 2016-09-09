<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Page;

class MediaController extends Controller
{
   public function media(Request $request){

      $titres = Page::all();

      return view('media', ['titres' => $titres]);
  }


}
