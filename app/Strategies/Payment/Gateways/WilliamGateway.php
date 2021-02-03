<?php
namespace App\Strategies\Payment\Gateways;

use App\Models\Order;
use App\Models\Transaction;
use App\Strategies\Payment\GatewayInterface;

class WilliamGateway implements GatewayInterface
{
    public function pay(Order $order)
    {
        return (object) [
            'url' => 'https://www.google.com/',
        ];
    }

    public function getPay(Transaction $transaction)
    {
        return (Object) [
            'int_estado_pago' => 1, //100->iniciado,200->rechazado,300->declinado
            'forma_pago' => 2, // 1->credit card,2->pse
        ];
    }
}
