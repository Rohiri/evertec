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

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard', [\App\Http\Livewire\TableOrderAdmin::class, '__invoke'])->name('dashboard');

    Route::get('/order', [\App\Http\Livewire\Orders::class, '__invoke'])->name('orders');
    Route::get('/my_orders', [\App\Http\Livewire\TableOrder::class, '__invoke'])->name('my-orders');
    Route::get('/order/{order}', 'OrderController@show')->name('order.show');
    Route::get('/order/payment/{order}', 'OrderController@pay')->name('order.payment');


    Route::get('/notification/{transaction_id}', 'OrderController@getPay')->name('notification');

});


Route::get('/wtf', function () {
	$order = Order::where('id',2);
    return response()->json($order->with('Transaction')->get());
});