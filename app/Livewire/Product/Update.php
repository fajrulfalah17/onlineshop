<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $productId;
    public $title;
    public $deskripsi;
    public $harga;
    public $image;
    public $imageOld;

    protected $listeners = [
        'editProduct'   => 'editProductHandler'
    ];

    public function closeForm()
    {
        $this->dispatch('closeForm');
    }

    public function render()
    {
        return view('livewire.product.update');
    }

    public function editProductHandler($product) 
    {
        $this->productId = $product['id'];
        $this->title = $product['title'];
        $this->deskripsi = $product['deskripsi'];
        $this->harga = $product['harga'];
        $this->imageOld = asset('/storage/'. $product['image']);

    }
}
