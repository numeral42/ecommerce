<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartColor extends Component
{
    public $colors;
    public $color_id = "";
    public $options = [
        'size' => null
    ];
    public $product;
    public $qty = 1;
    public $quantity = 0;
    /* public $carts; */

    public function mount()
    {
        $this->colors = $this->product->colors;
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
        $this->quantity = qty_available($this->product->id, $this->color_id);
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

    public function updatedColorId($value)
    {
        $color = $this->product->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;
    }
    public function render()
    {
      /*   $this->carts=Cart::content()->where('id',$this->product->id)->sum('qty'); */
        /* $this->colors = $this->product->colors; */
        return view('livewire.add-cart-color');
    }
}
