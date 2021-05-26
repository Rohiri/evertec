<?php

namespace App\Strategies\Payment;

use App\Models\Transaction;
use Dnetix\Redirection\PlacetoPay;
use App\Strategies\Payment\Gateways\WilliamGateway;
use App\Strategies\Payment\Gateways\PlaceToPayGateway;

/**
 * Payment Context
 */
final class PaymentContext
{
    /**
     * Gateways availables
     */
    const STRATEGY = [
        'place_to_pay' => PlaceToPayGateway::class,
        'william_pay' => WilliamGateway::class,
    ];

    /**
     * Check Is Valid Wategay
     *
     * @param string $paymentMethod Payment method
     *
     * @return boolean
     */
    public static function isValidWategay(string $paymentMethod)
    {
        return (array_key_exists($paymentMethod, self::STRATEGY))
            ? true
            : false;
    }
}
