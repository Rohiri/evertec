<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use App\Helpers\Helper;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Orders extends Component
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
    public $quantity = 0;

    /**
     * Propiedad del Modelo para data binding
     * @var [type]
     */
    public $price = 5000;

    /**
     * Propiedad del Modelo para data binding
     * @var [type]
     */
    public $total_price = 0;

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
	protected $queryString = ['search'];

    /**
     * Reglas de Validacion
     * @var [type]
     */
    protected $rules = [
        'customer_name' => 'required|min:4',
        'customer_email' => 'required|min:6',
        'customer_mobile' => 'required',
    ];

	/**
	 * Vista a renderizar
	 * @return [type] [description]
	 */
    public function render()
    {
        return view('livewire.orders.show',[
            'orders' => Order::where('customer_email', 'ILIKE',"%{$this->search}%")
                ->orderBy('id','desc')
                ->paginate(10),
        ])->extends('layouts.dashboard.dashboard');
    }

    /**
     * Funcion Para Guardar la Orden
     * @return [type] [description]
     */
    public function guardar()
    {
        /**
         * Llamamos las reglas de validacion
         * definidas en la propiedad $rules
         */
    	$this->validate();

        /**
         * Guardamos la Orden
         * @var App\Models\Order
         */
    	$order = Order::create([
    		'user_id' => Auth::user()->id,
    		'customer_name'   => $this->customer_name,
            'customer_email'  => $this->customer_email,
            'customer_mobile' => $this->customer_mobile,
            'quantity'        => $this->quantity,
            'total_price'     => Helper::moneyFormat($this->total_price),
            'status'          => 'CREATED',
    	]);

        $this->default();
    }

    /**
     * Comportamiento por defecto
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function default()
    {
    	$this->customer_name  = '';
        $this->customer_email = '';
        $this->customer_mobile = '';
        $this->quantity = 0;
        $this->total_price = 0;
    }

    /**
     * Calcula el Precio del Producto
     * @return [type] [description]
     */
    public function calculatePrice()
    {
        $this->total_price = Helper::money(($this->quantity * $this->price),2,'$');
    }

}
