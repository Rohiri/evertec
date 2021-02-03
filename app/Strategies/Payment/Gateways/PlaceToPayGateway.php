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
     * @var [type]
     */
    public $transaction;

    /**
     * [$placeToPay description]
     * @var [type]
     */
    public $placeToPay;

    /**
     * Constructor de metodo de pago.
     */
    public function __construct(PlaceToPay $placeToPay, Transaction $transaction)
    {
        $this->placeToPay = $placeToPay;
        $this->transaction = $transaction;
    }

    /**
     * Inicio de la transaccion place to pay
     * @param  Order  $order [description]
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
     * @param  Order  $order [description]
     * @return [type]        [description]
     */
    public function createTransaction(Order $order)
    {
        $request   = $this->payload($order);
        $response  = $this->placeToPay->request($request);

        if (!$response->isSuccessful()) {
            throw new \Exception("Error en Transaccion ({$response->status()->message()}).");
        }

        //Guardarmos la informacion de la transaccion
        $this->transaction->create([
            'order_id' => $order->id,
            'transaction_id' => Str::uuid(),
            'reference' => $order->reference,
            'redirect_url_payment' => $response->processUrl(),
            'request_id' => $response->requestId(),
            'current_status' => 'CREATED',
        ]);

        return $response;
    }

    /**
     * Payload del Pago
     * @param  Order  $order [description]
     * @return [type]        [description]
     */
    private function payload(Order $order): array
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
                "description" => "Compra de (".$order->quantity.") Productos",
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
            "returnUrl" => env('APP_URL').'/my_orders',
        ];
    }

    public function getPay(Transaction $transaction)
    {
        $response = $this->placeToPay->query($transaction->request_id);
        return $response->status();

        [
            'FAILED'   => 'CREATED'
            'APPROVED' => 'PAYED'
            'REJECTED' => 'CREATED'
            'PENDING'  => 'CREATED'
            'PENDING_VALIDATION' => 'CREATED'
            'REFUNDED' => 'CREATED'
            'ERROR' => 'CREATED'
        ]

//         OK  Petición de autenticación procesada correctamente.
// FAILED  Fallo en una petición de autenticación.
// APPROVED    Petición de pago o suscripción terminada
// REJECTED    Se ha declinado la transacción.
// PENDING Transacción pendiente para la sesión, debe estar bloqueada hasta la resolución.
// PENDING_VALIDATION  La sesión está pendiente de validación de identidad del usuario.
// REFUNDED    Reintegro de una transacción por solicitud de un tarjetahabiente al comercio.
    }
}
