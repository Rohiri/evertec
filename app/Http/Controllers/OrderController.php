<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
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
     * Return Order information
     *
     * @param App\Models\Order $order Order
     *
     * @return Illuminate\Support\Facades\Response
     */
    public function show(Order $order)
    {
        return View::make(
            "livewire.orders.detail",
            [
                'date' => Carbon::now()->format('Y-m-d'),
                'order' => $order
            ]
        );
    }

    /**
     * Process Order
     *
     * @param Order $order Order
     *
     * @return string [$string] url de pago
     */
    public function pay(Order $order): string
    {
        return redirect($this->getStrategy()->pay($order)->url);
    }

    /**
     * Iniciar Transaccion de Pago
     *
     * @param string $uuid uuid transaction reference
     *
     * @return object
     */
    public function getPay($uuid)
    {
        $transaction = Transaction::where('transaction_id', $uuid)->first();

        return $this->getStrategy()->getPay($transaction);
    }

    /**
     * Undocumented function
     *
     * @return object
     */
    public function getStrategy()
    {
        try {
            if (PaymentContext::isValidWategay(config('evertec.gateway'))) {
                $strategy = PaymentContext::STRATEGY[config('evertec.gateway')];
                switch (config('evertec.gateway')) {
                    case 'place_to_pay':
                        return new $strategy(
                            new PlacetoPay(
                                [   'login'   => env('PLACE_TO_PAY_LOGIN'),
                                    'tranKey' => env('PLACE_TO_PAY_KEY'),
                                    'url'     => env('PLACE_TO_PAY_URL'),
                                ]
                            ),
                            new Transaction()
                        );
                        break;

                    default:
                        return new $strategy();
                        break;
                }
            }
            return false;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
