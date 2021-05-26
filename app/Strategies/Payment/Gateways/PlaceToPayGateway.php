<?php

namespace App\Strategies\Payment\Gateways;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Dnetix\Redirection\Entities\Status;
use App\Strategies\Payment\GatewayInterface;

class PlaceToPayGateway implements GatewayInterface
{
    /**
     * [$transaction description]
     *
     * @var [type]
     */
    public $transaction;

    /**
     * [$placeToPay description]
     *
     * @var [type]
     */
    public $placeToPay;

    /**
     * Constructor
     *
     * @param PlaceToPay  $placeToPay  Place_to_pay
     * @param Transaction $transaction Transaction
     */
    public function __construct(PlaceToPay $placeToPay, Transaction $transaction)
    {
        $this->placeToPay = $placeToPay;
        $this->transaction = $transaction;
    }

    /**
     * Inicio de la transaccion place to pay
     *
     * @param Order $order [description]
     *
     * @return [type]        [description]
     */
    public function pay(Order $order)
    {
        DB::beginTransaction();
        try {
            $response = $this->createTransaction($order);
            DB::commit();
            return (object) [
                'success' => true,
                'url' => $response->processUrl(),
            ];
        } catch (\Dnetix\Redirection\Exceptions\PlacetoPayException $e) {
            Log::error($e->getMessage());
            DB::rollback();
            return (object) [
                'success' => false,
                'exception' => $e,
            ];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollback();
            return (object) [
                'success' => false,
                'exception' => $e,
            ];
        }
    }

    /**
     * Crea los datos de la transaccion
     *
     * @param Order $order [description]
     *
     * @return [type]        [description]
     */
    public function createTransaction(Order $order)
    {
        $transaction_id = Str::uuid();
        $request   = $this->payload($order, $transaction_id);
        $response  = $this->placeToPay->request($request);

        if (!$response->isSuccessful()) {
            throw new \Exception("Error en Transaccion: {$response->status()->message()}.");
        }

        //Guardarmos la informacion de la transaccion
        $this->transaction->create(
            ['order_id' => $order->id,
            'transaction_id' => $transaction_id,
            'reference' => $order->reference,
            'redirect_url_payment' => $response->processUrl(),
            'request_id' => $response->requestId(),
            'current_status' => 'CREATED']
        );

        return $response;
    }

    /**
     * Create Payload Transaction
     *
     * @param Order  $order          [description]
     * @param string $transaction_id ID Transacction
     *
     * @return array
     */
    private function payload(Order $order, $transaction_id): array
    {
        return [
            "locale" => "es_CO",
            "buyer" => [
                $order->customer_name,
                $order->customer_mail,
                $order->customer_mobile,
            ],
            "payment" => [
                "reference" => $order->reference,
                "description" => "Compra de (" . $order->quantity . ") Productos",
                "amount" => [
                    "currency" => "COP",
                    "total" => $order->total_price,
                ],
                "items" => [[
                    "name" => config('config.product_name'),
                    "price" => config('config.product_price')
                ]],
                "allowPartial" => false,
            ],
            "expiration" => \Carbon\Carbon::now()->addMinutes(25)->format("c"),
            "ipAddress" => request()->ip(),
            "userAgent" => request()->header('user-agent'),
            "returnUrl" => env('APP_URL') . '/my_orders',
            "returnUrl" => route("notification", $transaction_id)
        ];
    }

    /**
     * Obtiene la informacion detallada de una transaccion de pago.
     *
     * @param Transaction $transaction [description]
     *
     * @return [type]                   [description]
     */
    public function getPay(Transaction $transaction)
    {
        $response = $this->placeToPay->query($transaction->request_id);

        $transaction->update(
            ['current_status' => $response->status()->status()]
        );

        $transaction->order()->update(
            ['status' => $this->statusEqual()[$response->status()->status()]]
        );

        return collect(['success' => true]);
    }

    /**
     * Array para equivalencias de Estado
     *
     * @return [type] [description]
     */
    public function statusEqual()
    {
        return [
            'FAILED'   => 'CREATED',
            'APPROVED' => 'PAYED',
            'REJECTED' => 'CREATED',
            'PENDING'  => 'CREATED',
            'PENDING_VALIDATION' => 'CREATED',
            'REFUNDED' => 'CREATED',
            'ERROR' => 'CREATED',
        ];
    }
}
