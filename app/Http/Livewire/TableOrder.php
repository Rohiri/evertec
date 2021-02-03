<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class TableOrder extends Component
{
	use WithPagination;

    /**
     * Propiedad para busqueda en datatable
     * @var string
     */
	public $search = "";

    /**
     * Propiedad liveware para permitir queryString
     * @var array
     */
	//protected $queryString = ['search'];

	/**
	 * Vista a renderizar
	 * @return [type] [description]
	 */
    public function render()
    {
        $busqueda = $this->search;
        return view('livewire.orders.table',[
            'orders' => Order::where('user_id', Auth::user()->id)
                ->where(function($query) use ($busqueda){
                    $query->where('customer_name','ILIKE',"%{$busqueda}%")
                        ->orWhere('reference','ILIKE',"%{$busqueda}%")
                        ->orWhere('customer_email','ILIKE',"%{$busqueda}%")
                        ->orWhere('customer_mobile','ILIKE',"%{$busqueda}%")
                        ->orWhere('quantity','ILIKE',"%{$busqueda}%")
                        ->orWhere('total_price','ILIKE',"%{$busqueda}%")
                        ->orWhere('status','ILIKE',"%{$busqueda}%");
                })
                ->orderBy('id','desc')
                ->paginate(10),
        ])->extends('layouts.dashboard.dashboard');
    }

}
