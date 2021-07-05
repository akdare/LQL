<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Routing\RouteUri;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/comment', function () {
    return view('backend/comment');
});
/*
Route::get('/reponse', function () {
    return view('mails/reponse');
});
*/
/*
Route::get('/', function () {
    return view('backend/actu');
});
*/
Route::get('/mess2', function () {
    return view('backend/message');
});

Route::get('/mess', function () {
    return view('mails/messages');
});

// A changer listBook en accueil après création de la classe publication
Route::get('/', [BookController::class, 'index'])->name('home');
//Route::get('/','App\Http\Controllers\postController@index')->name('home');

//Route::get('/actu','App\Http\Controllers\BookController@actu')->name('actu.index');



Auth::routes();

Route::get('/books',[BookController::class, 'index'])->name('books.index');
Route::get('/books/create',[BookController::class, 'create'])->name('books.create');
//Route::post('/books/{book}', [BookController::class, 'store'])->name('books.store');
Route::post('/books/filter', [BookController::class, 'filter'])->name('books.filter');
//Route::put('/books/{book}', [BookController::class, 'index'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'delete'])->name('books.destroy');
Route::get('/search','App\Http\Controllers\BookController@search')->name('books.search');

//
//Route::post('books/addbook','App\Http\Controllers\BookController@addBook');
//
Route::post('books/ajout','App\Http\Controllers\BookController@ajout')->name('books.ajout');

Route::get('books/{book}', function (Book $book) {
    dd($book);
})->name('books.test');



Route::get('/deconnexion','App\Http\Controllers\BookController@deconnexion')->name('deconnexion');

//Route::get('/message','App\Http\Controllers\MessageController@index')->name('messages.index');
Route::post('/message','App\Http\Controllers\MessageController@store')->name('messages.store');


Route::get('/message','App\Http\Controllers\MessageController@index')->name('messages.index');
Route::get('/message/action', 'App\Http\Controllers\MessageController@action')->name('live_search.action');
Route::get('/envoi','App\Http\Controllers\MessageController@create')->name('messages.create');
Route::get('/edit/{message}','App\Http\Controllers\MessageController@edit')->name('messages.edit');
Route::post('/edit/{message}','App\Http\Controllers\MessageController@edit')->name('messages.edit');
Route::delete('/messages/{message}','App\Http\Controllers\MessageController@destroy')->name('messages.destroy');
Route::get('/searchs','App\Http\Controllers\MessageController@search')->name('messages.search');



//Route::get('/messages','App\Http\Controllers\MessageController@destroy')->name('messages.reponses');

Route::post('/reponse/{reponse}','App\Http\Controllers\ReponseController@store')->name('reponses.store');
Route::get('/reponse','App\Http\Controllers\ReponseController@index')->name('reponses.index');


Route::get('api/books/', 'App\Http\Controllers\BookController@getBooks');

Route::post('/actualites','App\Http\Controllers\postController@store')->name('post.store');
Route::get('/actualites','App\Http\Controllers\postController@index')->name('post.index');
Route::delete('/actualites/{post}','App\Http\Controllers\postController@destroy')->name('post.delete');


Route::post('/wish','App\Http\Controllers\WishController@store')->name('wish.store');
Route::get('/wish','App\Http\Controllers\WishController@index')->name('wish.index');
Route::delete('/wish/{wish}','App\Http\Controllers\WishController@destroy')->name('wish.destroy');

Route::post('/to_read','App\Http\Controllers\ToReadController@store')->name('to_read.store');
Route::get('/to_read','App\Http\Controllers\ToReadController@index')->name('to_read.index');
Route::delete('/to_read/{to_read}','App\Http\Controllers\ToReadController@destroy')->name('to_read.destroy');


Route::post('/chronique','App\Http\Controllers\ChroniqueController@store')->name('chronique.store');
Route::get('/chronique','App\Http\Controllers\ChroniqueController@index')->name('chronique.index');
Route::delete('/chronique/{chronique}','App\Http\Controllers\ChroniqueController@destroy')->name('chronique.destroy');


Route::post('/comment/{post_id}','App\Http\Controllers\CommentController@store')->name('comments.store');
Route::get('/comment','App\Http\Controllers\CommentController@index')->name('comments.index');
Route::delete('/comment/{comment}','App\Http\Controllers\CommentController@destroy')->name('comments.delete');


Route::get('/profil','App\Http\Controllers\ProfilController@index')->name('profil.index');
Route::post('/profil','App\Http\Controllers\ProfilController@store')->name('profil.store');

Route::post('/reading','App\Http\Controllers\ReadingController@store')->name('readings.store');
Route::get('/reading','App\Http\Controllers\ReadingController@index')->name('readings.index');
Route::delete('/reading/{reading}','App\Http\Controllers\ReadingController@destroy')->name('reading.delete');


Route::post('/postText','App\Http\Controllers\PostTextController@store')->name('postTexts.store');

//Route::get('/like/{id}', 'App\Http\Controllers\postController@like')->name('like');
Route::post('/like/{id}', 'App\Http\Controllers\postController@like')->name('like');


//Route::get('/dislike/{id}', 'App\Http\Controllers\postController@dislike')->name('dislike');
Route::post('/dislike/{id}', 'App\Http\Controllers\postController@dislike')->name('dislike');


Route::get('/view/{id}','App\Http\Controllers\postController@view')->name('post.view');


/*
Route::get('/profil', function (){
    return view('/editProfil');
});
*/
