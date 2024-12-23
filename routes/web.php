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
use App\Http\Controllers\Courses\Tableinstructor\InstructorsC;
use App\Http\Controllers\Letter\Letter\LetterC;
use App\Http\Controllers\Courses\Alfresco\AlfrescoC;
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

//ROUTE_COUSER ---- > Beneficio
Route::get('/courses/list', CoursesC::class)->name('courses.list')->middleware('auth');
Route::get('/courses/create', [CoursesC::class, 'create'])->name('courses.create')->middleware('auth');
Route::post('/courses/save', [CoursesC::class, 'save'])->name('courses.save')->middleware('auth');
Route::post('/courses/table', [CoursesC::class, 'searchTable']);
Route::match(['get', 'post'], '/courses/edit/{id}', [CoursesC::class, 'edit'])->name('courses.edit')->middleware('auth');
Route::delete('/courses/delete/{id}', [CoursesC::class, 'destroy']);
//ROUTE_COUSER ---- > Categoria
Route::get('/coursescategoria/list', Courses2C::class)->name('coursescategoria.list')->middleware('auth');
Route::get('/coursescategoria/create', [Courses2C::class, 'create'])->name('coursescategoria.create')->middleware('auth');
Route::post('/coursescategoria/save', [Courses2C::class, 'save'])->name('coursescategoria.save')->middleware('auth');
Route::post('/coursescategoria/table', [Courses2C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursescategoria/edit/{id}', [Courses2C::class, 'edit'])->name('coursescategoria.edit')->middleware('auth');
Route::delete('/coursescategoria/delete/{id}', [Courses2C::class, 'destroy']);

//ROUTE_COUSER ---- > Coordinacion
Route::get('/coursescoordinacion/list', Courses3C::class)->name('coursescoordinacion.list')->middleware('auth');
Route::get('/coursescoordinacion/create', [Courses3C::class, 'create'])->name('coursescoordinacion.create')->middleware('auth');
Route::post('/coursescoordinacion/save', [Courses3C::class, 'save'])->name('coursescoordinacion.save')->middleware('auth');
Route::post('/coursescoordinacion/table', [Courses3C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursescoordinacion/edit/{id}', [Courses3C::class, 'edit'])->name('coursescoordinacion.edit')->middleware('auth');
Route::delete('/coursescoordinacion/delete/{id}', [Courses3C::class, 'destroy']);

//ROUTE_COUSER ---- > Estatuto Orgánico
Route::get('/coursesestatuto/list', Courses4C::class)->name('coursesestatuto.list')->middleware('auth');
Route::get('/coursesestatuto/create', [Courses4C::class, 'create'])->name('coursesestatuto.create')->middleware('auth');
Route::post('/coursesestatuto/save', [Courses4C::class, 'save'])->name('coursesestatuto.save')->middleware('auth');
Route::post('/coursesestatuto/table', [Courses4C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursesestatuto/edit/{id}', [Courses4C::class, 'edit'])->name('coursesestatuto.edit')->middleware('auth');
Route::delete('/coursesestatuto/delete/{id}', [Courses4C::class, 'destroy']);

//ROUTE_COUSER ---- > Modalidad
Route::get('/coursesmodalidad/list', Courses5C::class)->name('coursesmodalidad.list')->middleware('auth');
Route::get('/coursesmodalidad/create', [Courses5C::class, 'create'])->name('coursesmodalidad.create')->middleware('auth');
Route::post('/coursesmodalidad/save', [Courses5C::class, 'save'])->name('coursesmodalidad.save')->middleware('auth');
Route::post('/coursesmodalidad/table', [Courses5C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursesmodalidad/edit/{id}', [Courses5C::class, 'edit'])->name('coursesmodalidad.edit')->middleware('auth');
Route::delete('/coursesmodalidad/delete/{id}', [Courses5C::class, 'destroy']);

//ROUTE_COUSER ---- > Nombre Acción
Route::get('/coursesnombreacc/list', Courses6C::class)->name('coursesnombreacc.list')->middleware('auth');
Route::get('/coursesnombreacc/create', [Courses6C::class, 'create'])->name('coursesnombreacc.create')->middleware('auth');
Route::post('/coursesnombreacc/save', [Courses6C::class, 'save'])->name('coursesnombreacc.save')->middleware('auth');
Route::post('/coursesnombreacc/table', [Courses6C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursesnombreacc/edit/{id}', [Courses6C::class, 'edit'])->name('coursesnombreacc.edit')->middleware('auth');
Route::delete('/coursesnombreacc/delete/{id}', [Courses6C::class, 'destroy']);

//ROUTE_COUSER ---- > Organizacion
Route::get('/coursesorganizacion/list', Courses7C::class)->name('coursesorganizacion.list')->middleware('auth');
Route::get('/coursesorganizacion/create', [Courses7C::class, 'create'])->name('coursesorganizacion.create')->middleware('auth');
Route::post('/coursesorganizacion/save', [Courses7C::class, 'save'])->name('coursesorganizacion.save')->middleware('auth');
Route::post('/coursesorganizacion/table', [Courses7C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursesorganizacion/edit/{id}', [Courses7C::class, 'edit'])->name('coursesorganizacion.edit')->middleware('auth');
Route::delete('/coursesorganizacion/delete/{id}', [Courses7C::class, 'destroy']);

//ROUTE_COUSER ---- > Programa
Route::get('/coursesprograma/list', Courses8C::class)->name('coursesprograma.list')->middleware('auth');
Route::get('/coursesprograma/create', [Courses8C::class, 'create'])->name('coursesprograma.create')->middleware('auth');
Route::post('/coursesprograma/save', [Courses8C::class, 'save'])->name('coursesprograma.save')->middleware('auth');
Route::post('/coursesprograma/table', [Courses8C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursesprograma/edit/{id}', [Courses8C::class, 'edit'])->name('coursesprograma.edit')->middleware('auth');
Route::delete('/coursesprograma/delete/{id}', [Courses8C::class, 'destroy']);

//ROUTE_COUSER ---- > Tipo de acción
Route::get('/coursestipoac/list', Courses9C::class)->name('coursestipoac.list')->middleware('auth');
Route::get('/coursestipoac/create', [Courses9C::class, 'create'])->name('coursestipoac.create')->middleware('auth');
Route::post('/coursestipoac/save', [Courses9C::class, 'save'])->name('coursestipoac.save')->middleware('auth');
Route::post('/coursestipoac/table', [Courses9C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursestipoac/edit/{id}', [Courses9C::class, 'edit'])->name('coursestipoac.edit')->middleware('auth');
Route::delete('/coursestipoac/delete/{id}', [Courses9C::class, 'destroy']);

//ROUTE_COUSER ---- >
Route::get('/coursestipocur/list', Courses10C::class)->name('coursestipocur.list')->middleware('auth');
Route::get('/coursestipocur/create', [Courses10C::class, 'create'])->name('coursestipocur.create')->middleware('auth');
Route::post('/coursestipocur/save', [Courses10C::class, 'save'])->name('coursestipocur.save')->middleware('auth');
Route::post('/coursestipocur/table', [Courses10C::class, 'searchTable']);
Route::match(['get', 'post'], '/coursestipocur/edit/{id}', [Courses10C::class, 'edit'])->name('coursestipocur.edit')->middleware('auth');
Route::delete('/coursestipocur/delete/{id}', [Courses10C::class, 'destroy']);

//ROUTE_COUSER ---- >Tabla instructores
Route::get('/tableinstructor/list', InstructorsC::class)->name('tableinstructor.list')->middleware('auth');

//ROUTE_COUSER ---- >Alfresco

// Ruta para mostrar el formulario de carga de archivo
Route::get('/alfresco/upload', [AlfrescoC::class, 'showUploadForm'])->name('alfresco.upload.form');

// Ruta para manejar la carga de archivo
Route::post('/upload-file', [AlfrescoC::class, 'uploadFile'])->name('alfresco.upload.file');








