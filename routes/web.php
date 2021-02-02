<?php

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Producto;
use Illuminate\Support\Facades\Response;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

/*
|--------------------------------------------------------------------------
| Rutas En Las que se necesita estar Autenticado
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web', 'auth']], function () {
});
