<?php

use App\Http\Controllers\Letter\Collection\CollectionClaveC;
use App\Http\Controllers\Letter\Collection\CollectionTramiteC;
use App\Http\Controllers\Letter\Collection\CollectionUnidadC;
use App\Http\Controllers\Administration\LoginC;
use App\Http\Controllers\Administration\RecoverC;
use App\Http\Controllers\Administration\RegisterC;
use App\Http\Controllers\Administration\UserC;
use App\Http\Controllers\Home\AboutC;
use App\Http\Controllers\Home\DashboardC;
use App\Http\Controllers\Letter\Collection\CollectionAreaC;
use App\Http\Controllers\Courses\Courses\CoursesC;
use App\Http\Controllers\Courses\Coursescategoria\Courses2C;
use App\Http\Controllers\Courses\Coursescoordinacion\Courses3C;
use App\Http\Controllers\Courses\Coursesestatuto\Courses4C;
use App\Http\Controllers\Courses\Coursesmodalidad\Courses5C;
use App\Http\Controllers\Courses\Coursesnombreacc\Courses6C;
use App\Http\Controllers\Courses\Coursesorganizacion\Courses7C;
use App\Http\Controllers\Courses\Coursesprograma\Courses8C;
use App\Http\Controllers\Courses\Coursestipoac\Courses9C;
use App\Http\Controllers\Courses\Coursestipocur\Courses10C;
use App\Http\Controllers\Letter\Letter\LetterC;
use Illuminate\Support\Facades\Route;


Route::get('/login', LoginC::class)->name('login'); ///ROUTE_LOGIN
Route::get('/register', RegisterC::class)->name('register'); ///ROUTE_REGISTER
Route::get('/recover', RecoverC::class)->name('recover');//ROUTE_RECOVER
Route::post('/login', [LoginC::class, 'authenticate']);///ROUTE_AUTHENTICATE

///IS_PROTECT
Route::get('/dashboard', [DashboardC::class, 'dashboard'])->name('dashboard')->middleware('auth'); //ROUTE_DASH BOARD
Route::get('/about', AboutC::class)->name('about')->middleware('auth'); //ROUTE_ABOUT
Route::post('/logout', [LoginC::class, 'logout'])->name('logout')->middleware('auth');//ROUTE_LOGOUT

//ROUTE_USER
Route::get('/user', UserC::class)->name('user.list')->middleware('auth'); //ROUTE_USER
Route::get('/user/list', [UserC::class, 'list'])->middleware('auth'); //ROUTE_LIST_OF_USER
Route::get('/user/create', [UserC::class, 'create'])->name('user.create')->middleware('auth'); //ROUTE_CREATE
Route::post('/user/save', [UserC::class, 'save'])->name('user.save')->middleware('auth');
Route::get('/user/edit/{id}', [UserC::class, 'edit'])->name('user.edit')->middleware('auth');

//ROUTE_LETTER
Route::get('/letter/list', LetterC::class)->name('letter.list')->middleware('auth');
Route::get('/letter/table', [LetterC::class, 'table'])->name('letter.table')->middleware('auth');
Route::get('/letter/create', [LetterC::class, 'create'])->name('letter.create')->middleware('auth');
Route::get('/letter/edit/{id}', [LetterC::class, 'edit'])->name('letter.edit')->middleware('auth');
Route::post('/letter/save', [LetterC::class, 'save'])->name('letter.save')->middleware('auth');
Route::post('/letter/collection/collectionArea', [CollectionAreaC::class, 'collection'])->name('letter.collection.area')->middleware('auth');
Route::post('/letter/collection/collectionUnidad', [CollectionUnidadC::class, 'collection'])->name('letter.collection.unidad')->middleware('auth');
Route::post('/letter/collection/collectionTramite', [CollectionTramiteC::class, 'collection'])->name('letter.collection.tramite')->middleware('auth');
Route::post('/letter/collection/collectionClave', [CollectionClaveC::class, 'collection'])->name('letter.collection.clabe')->middleware('auth');

//ROUTE_COUSER ---- >Beneficio
Route::get('/courses/list', CoursesC::class)->name('courses.list')->middleware('auth');
Route::get('/courses/create', [CoursesC::class, 'create'])->name('courses.create')->middleware('auth');
Route::post('/courses/save', [CoursesC::class, 'save'])->name('courses.save')->middleware('auth');
//ROUTE_COUSER 
Route::get('/coursescategoria/list', Courses2C::class)->name('coursescategoria.list')->middleware('auth');
Route::get('/coursescoordinacion/list', Courses3C::class)->name('coursescoordinacion.list')->middleware('auth');
Route::get('/coursesestatuto/list', Courses4C::class)->name('coursesestatuto.list')->middleware('auth');
Route::get('/coursesmodalidad/list', Courses5C::class)->name('coursesmodalidad.list')->middleware('auth');
Route::get('/coursesnombreacc/list', Courses6C::class)->name('coursesnombreacc.list')->middleware('auth');
Route::get('/coursesorganizacion/list', Courses7C::class)->name('coursesorganizacion.list')->middleware('auth');
Route::get('/coursesprograma/list', Courses8C::class)->name('coursesprograma.list')->middleware('auth');
Route::get('/coursestipoac/list', Courses9C::class)->name('coursestipoac.list')->middleware('auth');
Route::get('/coursestipocur/list', Courses10C::class)->name('coursestipocur.list')->middleware('auth');