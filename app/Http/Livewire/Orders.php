<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use App\Helpers\Helper;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Orders extends Component
{
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
    public $price;

    /**
     * Propiedad del Modelo para data binding
     * @var [type]
     */
    public $product;

    /**
     * Propiedad del Modelo para data binding
     * @var [type]
     */
    public $total_price = 0;

    /**
     * Reglas de Validacion
     * @var [type]
     */
    protected $rules = [
        'customer_name' => 'required|min:4',
        'customer_email' => 'required|min:6',
        'customer_mobile' => 'required',
    ];

    public function mount()
    {
        $this->price = config('evertec.product_price');
        $this->product = config('evertec.product_name');
    }

	/**
	 * Vista a renderizar
	 * @return [type] [description]
	 */
    public function render()
    {
        return view('livewire.orders.show')->extends('layouts.dashboard.dashboard');
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
