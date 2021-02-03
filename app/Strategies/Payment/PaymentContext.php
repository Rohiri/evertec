<?php

namespace App\Strategies\Payment;

use App\Models\Transaction;
use Dnetix\Redirection\PlacetoPay;
use App\Strategies\Payment\Gateways\WilliamGateway;
use App\Strategies\Payment\Gateways\PlaceToPayGateway;

final class PaymentContext
{
    const STRATEGY = [
        'place_to_pay' => PlaceToPayGateway::class,
        'william_pay' => WilliamGateway::class,
    ];

    public static function isValidWategay(string $paymentMethod)
    {
        if (array_key_exists($paymentMethod, self::STRATEGY)) {
            return 'true';
        }
        return false;
    }
}
