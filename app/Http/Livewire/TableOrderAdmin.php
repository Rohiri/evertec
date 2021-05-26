<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TableOrderAdmin extends Component
{
    use WithPagination;

    /**
     * Propiedad para busqueda en datatable
     *
     * @var string
     */
    public $search = "";

    /**
     * Propiedad liveware para permitir queryString
     *
     * @var array
     */
    //protected $queryString = ['search'];

    /**
     * Vista a renderizar
     *
     * @return [type] [description]
     */
    public function render()
    {
        return view(
            'livewire.orders.table_admin',
            ['orders' => Order::where('customer_name', 'ILIKE', "%{$this->search}%")
                ->orWhere('reference', 'ILIKE', "%{$this->search}%")
                ->orWhere('customer_email', 'ILIKE', "%{$this->search}%")
                ->orWhere('customer_mobile', 'ILIKE', "%{$this->search}%")
                ->orWhere('quantity', 'ILIKE', "%{$this->search}%")
                ->orWhere('total_price', 'ILIKE', "%{$this->search}%")
                ->orWhere('status', 'ILIKE', "%{$this->search}%")
                ->orderBy('id', 'desc')
                ->paginate(10),
            ]
        )->extends('layouts.dashboard.dashboard');
    }
}
