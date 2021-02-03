<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Strategies\Payment\PaymentContext;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return View::make("livewire.orders.detail",[
            'date' => Carbon::now()->format('Y-m-d'),
            'order' => $order
        ]);
        return Response::json($order);
    }

    /**
     * Iniciar Transaccion de Pago
     * @return [type] [description]
     */
    public function pay(Order $order)
    {
       
    }

    public function getStrategy()
    {
        try {
            //Es una pasarela de pago valida
            if (PaymentContext::isValidWategay(config('evertec.gateway'))) {

                $strategy = PaymentContext::STRATEGY[config('evertec.gateway')];

                switch (config('evertec.gateway')) {
                    case 'place_to_pay':
                        return new $strategy(new PlacetoPay([
                            'login'   => env('PLACE_TO_PAY_LOGIN'),
                            'tranKey' => env('PLACE_TO_PAY_KEY'),
                            'url'     => env('PLACE_TO_PAY_URL'),
                        ]), new Transaction());
                        break;

                    default:
                        ;
                        return new $strategy;
                        break;
                }
            }

            return false;

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
