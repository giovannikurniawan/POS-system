<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as ProducModel;

class Product extends Component
{
    public function render()
    {
        $products = ProducModel::orderBy('created_at', 'DESC')->get();
        return view('livewire.product', [
            'products' => $products
        ]);
    }
}
