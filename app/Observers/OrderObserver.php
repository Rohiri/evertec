<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderObserver
{
    public function creating(Order $order)
    {
        $query = DB::table('orders')
            ->select(DB::raw("CAST(SUBSTRING(reference FROM 6 FOR 6) AS INTEGER) + 1 AS reference"))
            ->orderBy('reference', 'desc')
            ->first();
        $valor = ($query == NULL || $query == '') ? 1 : $query->reference;

        //Generamos el numero del formulario
        $order->reference = Carbon::now()->year. '-'.str_pad($valor, 5,0,STR_PAD_LEFT);
    }

    public function created(Order $order)
    {
        //
    }

    public function updated(Order $order)
    {
        //
    }


    public function deleted(Order $order)
    {
        //
    }

    public function restored(Order $order)
    {
        //
    }

    public function forceDeleted(Order $order)
    {
        //
    }
}
