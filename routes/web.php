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
use \Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users', 'UserController');
Route::resource('/empleado', 'EmpleadoController');
Route::resource('/cliente', 'ClienteController');

Route::resource('roles', 'RoleController');

/**********PARA COCHE ****************/
Route::resource('/coche', 'CocheController');
Route::get('/coche/{id}/borrar', 'CocheController@borrarCoche');
/**********PARA COCHE ****************/

/**********PARA ventas ****************/
Route::get('ventas/{id}/comprar', 'VentaController@comprar');
Route::get('ventas', 'VentaController@verVentas');
Route::post('ventas', 'VentaController@store');
Route::get('ventas/{id}', 'VentaController@actualizarVenta');
Route::put('ventas/{id}/edit', 'VentaController@confirmarCambio');


/*
Route::get('ventas/{id}/enviarEmailDeCompra', function () {
    return view('venta.pdfCompra');
});*/
/**********PARA ventas ****************/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/********** PARA EL ENVÍO DEL CORREO ****************/

Route::get('ventas/{id}/enviarEmailDeCompra', 'VentaController@enviarEmailDeCompra');// ->name('compraCoche.pdf');
Route::get('ventas/{id}/solicitarPago', 'VentaController@solicitarPago');// ruta para la solicitud de pago

/********** PARA EL ENVÍO DEL CORREO ****************/
/********** CASHIER PAGO ****************/
Route::resource('/pago', 'PagoController');
Route::post('/pago', 'PagoController@pago');
Route::resource('/solicitarPago', 'PagoController');
/********** CASHIER PAGO ****************/
