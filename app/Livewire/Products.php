<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $product_name = '';
    public $quantity = '';
    public $price = '';
    public $condition = '';
    public $description = '';
    public $productId;
    public $isEditModalOpen = false;
    public $isDeleteModalOpen = false;

    public function addprod()
    {
        sleep(2);

        $this->validate([
            'product_name' => 'required|min:4',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'condition' => 'required|in:New,Slightly Used,Old',
            'description' => 'nullable|string|max:500',
        ]);

        Product::create([
            'product_name' => $this->product_name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'condition' => $this->condition,
            'description' => $this->description,
        ]);

        $this->reset(['product_name', 'quantity', 'price', 'condition', 'description']);
        session()->flash('message', 'Product added successfully');
    }

    public function openEditModal($id)
    {
        $this->resetValidation(); 
        $product = Product::findOrFail($id);  

        $this->productId = $id;
        $this->product_name = $product->product_name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->condition = $product->condition;
        $this->description = $product->description;

        $this->isEditModalOpen = true;
    }

    public function updateProduct()
    {
        $this->validate([
            'product_name' => 'required|min:4',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'condition' => 'required|in:New,Slightly Used,Old',
            'description' => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($this->productId);
        $product->update([
            'product_name' => $this->product_name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'condition' => $this->condition,
            'description' => $this->description,
        ]);

        $this->reset(['product_name', 'quantity', 'price', 'condition', 'description', 'productId']);
        $this->isEditModalOpen = false;

        session()->flash('message', 'Product updated successfully');
    }   


    public function openDeleteModal($id)
    {
        $this->productId = $id;
        $this->isDeleteModalOpen = true;
    }

    public function deleteProduct()
    {
        // Find and delete the product
        Product::findOrFail($this->productId)->delete();

        // Reset the necessary properties
        $this->reset(['productId']);

        // Close the modal
        $this->isDeleteModalOpen = false;  // Hide the delete modal

        // Display a success message
        session()->flash('message', 'Product deleted successfully');
    }


    public function render()
    {
        return view('livewire.products', [
            'products' => Product::paginate(5),
        ]);
    }
}
