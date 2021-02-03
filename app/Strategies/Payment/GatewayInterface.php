<?php

namespace App\Strategies\Payment;

use App\Models\Order;
use App\Models\Transaction;

interface GatewayInterface
{
    public function pay(Order $order);

    public function getPay(Transaction $transaction);
}
