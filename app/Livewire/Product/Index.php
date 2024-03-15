<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search;
    public $formVisible;
    public $formUpdate = false;

    protected $updateQueryString = [
        ['search' => ['except' => '']],
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $listeners = [
        'closeForm' => 'closeFormHandler',
        'productStored' => 'productStoredHandler'
    ];

    public function render()
    {
        $product = Product::latest()->paginate($this->paginate);
        $search = Product::latest()->where('title', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);

        return view('livewire.product.index', [
            'products'  => $this->search === null ? $product : $search
        ]);
    }

    public function closeFormHandler()
    {
        $this->formVisible = false;
    }

    public function productStoredHandler() 
    {
        $this->formVisible = false;
        session()->flash('message', 'Produk berhasil dibuat');
    }

    public function editProduct($produtId)
    {
        $this->formUpdate = true;
        $this->formVisible = true;

        $product = Product::find($produtId);

        $this->dispatch('editProduct', $product);
    }
}
