<?php

return [

    /**
     * Precio del Producto
     */
    'product_price' => env('PRODUCT_PRICE',5000),

    /**
     * Nombre Del Producto
     */
    'product_name' => env('PRODUCT_NAME','Nevera Haceb'),

    /**
     * Pasarelas de Pago
     */
    'gateway' => env('PAYMENT_GATEWAY','william_pay'),
];
