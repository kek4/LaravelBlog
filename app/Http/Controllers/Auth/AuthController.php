<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';


    protected $redirectAfterLogout = '/login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      $dt = new Carbon();
      $dt->subYears(18)->addDay()->format('d-m-Y');
        return Validator::make($data, [
            'nom' => 'required|regex:/[a-z\-\ ]{3,}/i',
            'prenom' => 'required|regex:/[a-z\-\ ]{3,}/i',
            'email' => 'required|regex:/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i|unique:user',
            'password' => ['required'],
            'password_confirmation' => 'same:password',
            'phone' => ['required','regex:/^(0|(00|\+)33)[1-7][0-9]{8}/i'],
            'cp' => 'required|digits:5',
            'biographie' => 'min:15',
            'ville' => 'required|regex:/[a-z\-\ ]{3,}/i',
            'birthday' => 'required|date_format:d-m-Y|before:'.$dt,
            'url' => 'image|dimensions:min_width=99,min_height=200',
            'biographie' => 'required',
         ],[
            'required' => 'Le champ :attribute est requis',
            'date_format' => "Le format de date doit être dd-mm-aaaa",
            'before' => "La date doit être inférieur ou égal à aujourd'hui",
            'dimensions' => "Avatar trop petit",
         ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

      if (isset($data['url']) && !empty($data['url'])) {
          $destinationPath = public_path("/uploads/");//destination
          $file = $data['url'];//recupere le fichier
          $fileName = $file->getClientOriginalName();//recupere le nom
          $file->move($destinationPath, $fileName);//bouge le fichier
      }

         $birthday = Carbon::createFromFormat('d-m-Y', $data['birthday'])->format('Y-m-d');
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'code_postal' => $data['cp'],
            'biographie' => $data['biographie'],
            'ville' => $data['ville'],
            'avatar' => $fileName,
            'date_auth' => new \DateTime(),
            'date_naissance' => Carbon::parse($birthday),
        ]);


    }
}
