<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $deskripsi;
    public $harga;
    public $image;
    
    public function closeForm()
    {
        $this->dispatch('closeForm');
    }

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|min:3',
            'deskripsi' => 'required|max:180',
            'harga' => 'required|numeric',
            'image' =>'image|max:1024'
        ]);

        DB::beginTransaction();
        try {
            $imageName = "";
            
            if($this->image) {
                $imageName = \Str::slug($this->title, '-') . '-' . uniqid() . '.' . $this->image->getClientOriginalExtension();

                $this->image->storeAs('public', $imageName, 'local');
            }

            Product::create([
                'title' => $this->title,
                'deskripsi' => $this->deskripsi,
                'harga' => $this->harga,
                'image' => $imageName,
            ]);

            $this->dispatch('productStored');

            DB::commit();
        } catch (\Exception $e) {
            
            DB::rollBack();
        }
    }
}