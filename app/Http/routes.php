<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group([
   'prefix' =>'admin',
   'middleware' => 'auth'], function () { //middleware : filtre d'authentification: uniquement si connecter

Route::get('/', 'WelcomeController@welcome')->name('homepage');
Route::get('/categories-stats', 'WelcomeController@statsCategories')->name('statsCategories');
Route::get('/articles-stats', 'WelcomeController@statsArticles')->name('statsArticles');
Route::get('/commentaires-stats', 'WelcomeController@comsArticles')->name('comsArticles');
Route::get('/tchat/{skip?}/{take?}', function($skip = 0, $take = 15){
   // take
   return App\Tchat::skip($skip)->take($take)->orderBy('id','desc')->get();
})->name('tchat');
Route::post('/tchat-add', 'TchatController@add')->name('tchat-add');
Route::post('/com-add/{articleId}', 'CommentaireController@addCom')->name('com-add');
Route::get('/com-random-art/{id}/{take}', 'CommentaireController@getComByArt')->name('com-random-art');

//Récupérer l'uri /contact et renvoyer une vue contact
//nom du controller@nom de la methode
Route::any('/contact', 'ContactController@contact')->name('contact');

//grouper une liste de route permet de les prefixer au niveau uri
Route::group(['prefix' => 'user'], function(){
   Route::any('/user', 'UserController@user')->name('user');
   Route::any('/list', 'UserController@listUser')->name('list');
});

Route::group(['prefix' => 'article', 'as' => 'art'], function(){
   Route::any('/list', 'ArticleController@listArticle')->name('list');
   Route::any('/voir/{id?}', 'ArticleController@voir')->name('voir');
   // on definit une route en get avec les argument qu'on veut recuperer pour le controlleur
   // puis le controler et la methode puis le nom de la vue pour l'appeller ds la route
   Route::get('/visible/{id}/{visible}', 'ArticleController@visible')->name('visible');
   Route::get('/delete/{id}', 'ArticleController@delete')->name('delete');
   Route::get('/pdf/{id}', 'ArticleController@pdf')->name('pdf');
   Route::any('/like/{id}', 'ArticleController@like')->name('like');
});

Route::group(['prefix' => 'commentaire', 'as' => 'com'], function(){
   Route::any('/list', 'CommentaireController@listCommentaire')->name('list');
   Route::get('/voir/{id}', 'CommentaireController@delete')->name('delete');
   Route::get('/etat/{id}{etat}', 'CommentaireController@etat')->name('etat');
});

Route::any('/media', 'MediaController@media')->name('media');


Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/concept', function () {
    return view('concept');
})->name('concept');

Route::get('/about', function () {
    return view('about');
})->name('about');

});

Route::auth();
