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

/*Route::get('/', function () {
    return view('test');
});
*/

Auth::routes();

Route::middleware(['auth',])->group(function () {

	Route::get('/', 'HomeController@index')->name('home');
  //Route::get('user-autocomplete', 'UserController@autocomplete');

  Route::resource('user', 'Admin\UserController');
  Route::get('users', 'Admin\UserController@getUser');
  Route::get('users/{user_id}/delete', 'Admin\UserController@delete');
  //Route::resource('logins', 'LoginController');
  Route::resource('permisos', 'Admin\PermisosController');
  Route::resource('roles', 'Admin\RolesController');
  Route::resource('personal', 'Covid\PersonalController');
  Route::resource('visitante', 'Covid\VisitanteController');
  Route::resource('inventario', 'Covid\InventarioController');
  Route::get('personals', 'Covid\PersonalController@getPersonal');
  Route::get('visitantes', 'Covid\VisitanteController@getVisitante');
  Route::get('consmov', 'Covid\ConsultarController@getMovimiento');
  Route::get('consulta', 'Covid\ConsultarController@index');
  Route::resource('movimientos', 'Covid\MovimientosController');
  Route::get('pdfrecibo/{id}', 'Covid\ReciboController@create')->name('pdfrecibo');
  Route::get('view', 'Covid\ConsultarController@consulta');
  Route::resource('reportes', 'Covid\ReportesController');
  Route::post('pdfmov', 'Covid\ReportesController@pdfmov')->name('pdfmov');

  //Route::resource('personal', Covid\PersonalController::class);

});