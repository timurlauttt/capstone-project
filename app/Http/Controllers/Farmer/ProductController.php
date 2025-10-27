<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products()->latest()->paginate(10);
        return view('farmer.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('farmer.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:available,unavailable,preorder',
            'images.*' => 'image|max:5120'
        ]);

        $user = Auth::user();
        $product = $user->products()->create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']).'-'.Str::random(6),
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'price' => $data['price'],
            'unit' => $data['unit'] ?? 'batang',
            'stock' => $data['stock'],
            'status' => $data['status']
        ]);

        // handle images - store directly in public/product-images
        if ($request->hasFile('images')) {
            $dest = public_path('product-images');
            if (!\file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            foreach ($request->file('images') as $file) {
                $filename = Str::random(12) . '.' . $file->getClientOriginalExtension();
                $file->move($dest, $filename);
                // optional: generate thumbnail using Intervention
                try {
                    $img = Image::make($dest . '/' . $filename)->fit(1200, 800);
                    $img->save($dest . '/' . $filename);
                } catch (\Throwable $e) {
                    // ignore image processing errors
                }
                $product->images()->create(['path' => 'product-images/' . $filename]);
            }
        }

        return redirect()->route('farmer.products.index')->with('success', 'Product berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $categories = Category::all();
        return view('farmer.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:available,unavailable,preorder',
            'images.*' => 'image|max:5120'
        ]);

        $product->update([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'price' => $data['price'],
            'unit' => $data['unit'] ?? 'batang',
            'stock' => $data['stock'],
            'status' => $data['status']
        ]);

        // handle removal of selected existing images
        if ($request->filled('remove_images')) {
            $remove = $request->input('remove_images', []);
            foreach ($remove as $id) {
                $img = ProductImage::find($id);
                if (!$img) continue;
                // ensure image belongs to this product
                if ($img->product_id != $product->id) continue;
                $file = public_path($img->path);
                if (file_exists($file)) {
                    @unlink($file);
                }
                $img->delete();
            }
        }

        if ($request->hasFile('images')) {
            $dest = public_path('product-images');
            if (!\file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            foreach ($request->file('images') as $file) {
                $filename = Str::random(12) . '.' . $file->getClientOriginalExtension();
                $file->move($dest, $filename);
                try { $img = Image::make($dest . '/' . $filename)->fit(1200,800); $img->save($dest . '/' . $filename); } catch (\Throwable $e) {}
                $product->images()->create(['path' => 'product-images/' . $filename]);
            }
        }

        return redirect()->route('farmer.products.index')->with('success', 'Product berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        // delete images
        foreach ($product->images as $img) {
            $file = public_path($img->path);
            if (file_exists($file)) {
                @unlink($file);
            }
            $img->delete();
        }
        $product->delete();
        return redirect()->route('farmer.products.index')->with('success', 'Product berhasil dihapus');
    }

    public function toggleVisibility(Product $product)
    {
        $this->authorize('update', $product);
        
        $product->is_visible = !$product->is_visible;
        $product->save();

        $status = $product->is_visible ? 'ditampilkan' : 'disembunyikan';
        
        return redirect()->route('farmer.products.index')->with('success', "Produk berhasil {$status}");
    }
}
