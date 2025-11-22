<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.sidebar')]
class ProductForm extends Component
{
    use WithFileUploads;

    public $productId;
    public $name = '';
    public $description = '';
    public $price = '';
    public $stock = '';
    public $main_image_path;
    public $existing_image;
    public $is_published = false;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'main_image_path' => $this->isEditing ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'is_published' => 'boolean',
        ];
    }

    public function mount($id = null)
    {
        if ($id) {
            $product = ProductModel::where('user_id', Auth::id())->findOrFail($id);
            
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->existing_image = $product->main_image_path;
            $this->is_published = $product->is_published;
            $this->isEditing = true;
        }
    }

    public function getTitle()
    {
        return $this->isEditing ? 'Edit Produk' : 'Tambah Produk Baru';
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'is_published' => $this->is_published,
        ];

        // Handle image upload
        if ($this->main_image_path && is_object($this->main_image_path)) {
            $path = $this->main_image_path->store('products', 'public');
            $data['main_image_path'] = $path;
        }

        if ($this->isEditing) {
            $product = ProductModel::findOrFail($this->productId);
            
            // Delete old image if new one is uploaded
            if (isset($data['main_image_path']) && $product->main_image_path) {
                Storage::disk('public')->delete($product->main_image_path);
            }
            
            $product->update($data);
            session()->flash('message', 'Produk berhasil diperbarui!');
        } else {
            ProductModel::create($data);
            session()->flash('message', 'Produk berhasil ditambahkan!');
        }

        return $this->redirect(route('product.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.user.product-form')
            ->title($this->getTitle());
    }
}
