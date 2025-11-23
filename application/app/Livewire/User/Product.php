<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.sidebar')]
#[Title('Daftar Produk')]
class Product extends Component
{
    use WithPagination;

    public $productId;
    public $showDeleteModal = false;
    public $copied = false;

    public function checkPhoneRequirement()
    {
        if (!Auth::user()->phone) {
            session()->flash('warning', 'Anda harus mengisi nomor handphone terlebih dahulu untuk dapat menambah produk.');
            return false;
        }
        return true;
    }

    public function redirectToProfile()
    {
        if (!Auth::user()->phone) {
            return redirect()->route('profile.edit')->with('warning', 'Silakan lengkapi nomor handphone Anda untuk dapat menambah produk.');
        }
        return redirect()->route('product.create');
    }

    public function confirmDelete($id)
    {
        $this->productId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $product = ProductModel::findOrFail($this->productId);
        
        // Delete image
        if ($product->main_image_path) {
            Storage::disk('public')->delete($product->main_image_path);
        }
        
        $product->delete();
        
        session()->flash('message', 'Produk berhasil dihapus!');
        $this->showDeleteModal = false;
        $this->productId = null;
    }

    public function togglePublish($id)
    {
        $product = ProductModel::findOrFail($id);
        $product->update(['is_published' => !$product->is_published]);
        
        $status = $product->is_published ? 'dipublikasi' : 'disembunyikan';
        session()->flash('message', "Produk berhasil {$status}!");
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
        $this->productId = null;
    }

    public function copyUrl()
    {
        $this->copied = true;
        $this->dispatch('url-copied');
    }

    public function render()
    {
        $products = ProductModel::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('livewire.user.product', [
            'products' => $products,
        ]);
    }
}
