<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartSize extends Component
{
    public $colors = [];
    public $color_id = "";
    public $product, $sizes;
    public $qty = 1;
    public $quantity = 0;
    public $size_id = "";
    public $carts;
    public $options = [];

    public function mount()
    {
        $this->sizes = $this->product->sizes;
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
        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);
        $this->reset('qty','color_id','size_id');
        $this->emitTo('dropdown-cart', 'render');
    }

    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
        $this->options['size_id'] = $size->id;
    }
    public function updatedColorId($value)
    {
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id, $size->id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;
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
    {$this->carts=Cart::content()->where('id',$this->product->id)->sum('qty');
        return view('livewire.add-cart-size');
    }
}
