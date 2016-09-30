<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{

       protected $table = "user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'password', 'email', 'phone', 'code_postal', 'biographie', 'ville', 'avatar', 'date_auth', 'date_naissance'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getBadUser(){
      return DB::table('user')->select('nom', 'email')
                              ->leftJoin('comment', 'comment.user_id', '=', 'user.id')
                              ->whereNull('comment.user_id' )
                              ->get();
   }
}
