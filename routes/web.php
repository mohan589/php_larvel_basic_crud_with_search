<?php

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

use App\Course;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create/course','CourseController@create');
Route::post('/create/course','CourseController@store');
Route::get('/courses', 'CourseController@index');
Route::get('/edit/course/{id}','CourseController@edit');
Route::get('/show/course/{id}','CourseController@show');
Route::patch('/edit/course/{id}','CourseController@update');
Route::delete('/delete/course/{id}','CourseController@destroy');

Route::get ( '/', function () {
    return view ( 'home' );
} );
Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $courses = Course::where ( 'title', 'LIKE', '%' . $q . '%' ) -> get ();
    if (count ( $courses ) > 0)
        return view ( 'index' )->withDetails ( $courses )->withQuery ( $q );
    else
        return view ( 'index' )->withMessage ( 'No Details found. Try to search again !' );
} );
