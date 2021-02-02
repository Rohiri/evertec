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
     * Propiedad del Modelo para data binding
     * @var [type]
     */
	public $customer_name;

    /**
     * Propiedad del Modelo para data binding
     * @var [type]
     */
    public $customer_email;

    /**
     * Propiedad del Modelo para data binding
     * @var [type]
     */
    public $customer_mobile;

    /**
     * Propiedad del Modelo para data binding
     * @var [type]
     */
    public $status;

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
        return view('livewire.orders.table',[
            'orders' => Order::where('customer_email', 'ILIKE',"%{$this->search}%")
                ->orderBy('id','desc')
                ->paginate(10),
        ])->extends('layouts.dashboard.dashboard');
    }

}
