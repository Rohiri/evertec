<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Nombre de la tabla a la que apunta el modelo.
     * @var string
     */
    protected $table = 'orders';

    /**
     * Los campos que se permiten llenar.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status',
        'quantity',
        'total_price',
    ];

    /**
     * Los campos que deben ser ocultos
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Relacion al modelo User
     * @return [type] [description]
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Metodo Para traerme la ultima transaccion
     * de la orden
     * @return [type] [description]
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class)
            ->orderBy('created_at','desc')
            ->take(1);
    }

    public function getTotalPriceFormatAttribute()
    {
        return Helper::money($this->attributes['total_price'],2,'');
    }

    public function getLabelAttribute()
    {
        switch ($this->status) {
            case 'CREATED':
                return 'info';
                break;

            case 'PAYED':
                return 'success';
                break;

            case 'REJECTED':
                return 'error';
                break;

            default:
                return '';
                break;
        }
    }

}
