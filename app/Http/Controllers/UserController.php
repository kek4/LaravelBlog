<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use Validator;

class UserController extends Controller
{
   public function listUser(Request $request){

      $users = User::all();
      //transporteur c'est un tableau de données du controleur a la vue
      return view('user/list',['users' => $users]);
   }

   public function user(Request $request){

      $users = User::all();

      $dt = new Carbon();
      $dt->subYears(18)->addDay()->format('d-m-Y');

      $validator = Validator::make($request->all(), [
         'nom' => 'required|regex:/[a-z\-\ ]{3,}/i',
         'prenom' => 'required|regex:/[a-z\-\ ]{3,}/i',
         'email' => 'required|regex:/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i|unique:user',
         'password' => ['required','confirmed','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{6,20}$/'],
         'phone' => ['required','regex:/^(0|(00|\+)33)[1-7][0-9]{8}/i'],
         'cp' => 'required|digits:5',
         'biographie' => 'min:15',
         'ville' => 'required|regex:/[a-z\-\ ]{3,}/i',
         'birthday' => 'required|date_format:d-m-Y|before:'.$dt,
         'cgu' => 'required',
         'url' => 'image|dimensions:min_width=100,min_height=200',
      ],[
         'required' => 'Le champ :attribute est requis',
         'titre.regex' => "Le titre n'est pas valide",
         'titre.unique' => "Ce titre existe déjà",
         'date_format' => "Le format de date doit être dd-mm-aaaa",
         'before' => "La date doit être inférieur ou égal à aujourd'hui",
         'dimensions' => "Avatar trop petit",
      ]);

      if ($validator->fails() && $request->isMethod('post')) {
         return redirect()->route('user/user', ['users' => $users])->withErrors($validator)->withInput();
      }elseif ($request->isMethod('post')) {
         //formulaire saisi et valide
         //enregistrement en BDD
         //   $dateFormat = \DateTime::createFromFormat('d-m-Y', $request->date);

         $user = new User();

         $user->nom = $request->nom;
         $user->prenom = $request->prenom;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->phone = $request->phone;
         $user->code_postal = $request->cp;
         $user->biographie = $request->biographie;
         $user->ville = $request->ville;
         $user->date_naissance = Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d');
         $user->date_auth = new \DateTime();

         //upload image
         if ($request->hasFile('url')) {
            $destinationPath = public_path("/uploads/");//destination
            $file = $request->file('url');//recupere le fichier
            $fileName = $file->getClientOriginalName();//recupere le nom
            $file->move($destinationPath, $fileName);//bouge le fichier
            $user->avatar = $fileName;
         }else{
            $user->avatar = $fileName;
         }

         $user->save();


         return redirect()->route('user/user', ['users' => $users])->with('success','Nouvel utilisateur!');
      }

      return view('user/user', ['users' => $users]);
   }
}
