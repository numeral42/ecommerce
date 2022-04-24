<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $options = [
        'color_id' => null,
        'size_id' => null
    ];
    public $product;  
    public $qty = 1; 
    public $quantity;

    public function mount()
    {
        $this->quantity = qty_available($this->product->id);
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }
    public function addItem()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 123, //obligatorio
            'options' => $this->options
        ]);

        $this->quantity = qty_available($this->product->id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart', 'render');
       
    }

    public function decrement()
    {
        --$this->qty;
    }

    public function increment()
    {
        ++$this->qty;
    }    

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
