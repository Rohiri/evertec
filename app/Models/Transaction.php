<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Nombre de la tabla a la que apunta el modelo.
     * @var string
     */
    protected $table = 'transactions';

    /**
     * Los campos que se permiten llenar.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'transaction_id',
        'reference',
        'redirect_url_payment',
        'request_id',
        'current_status',
    ];
}
