<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $tax = "0%";

    public function render()
    {
        $products = ProductModel::orderBy('created_at', 'DESC')->get();

        $condition = new \Derrydecode\Cart\CartCondition([
            'name' => 'pajak',
            'type' => 'tax',
            'target' => $this->tax,
            'order' => 1
        ]);

        \Cart::session(Auth()->id())->condition($condition);
        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function ($cart) {
            return $cart->attributes->get('added_at');
        });


        return view('livewire.cart');
    }
}
