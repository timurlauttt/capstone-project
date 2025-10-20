@extends('farmer.layouts.app')
@section('title','Edit Product')
@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-xl mb-6">Edit Product</h1>
    <form action="{{ route('farmer.products.update',$product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Title</label>
            <input name="title" value="{{ $product->title }}" class="w-full border px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border px-3 py-2">{{ $product->description }}</textarea>
        </div>
        <div class="mb-4">
            <label>Price</label>
            <input name="price" value="{{ $product->price }}" class="border px-3 py-2">
        </div>
        <div class="mb-4">
            <label>Stock</label>
            <input name="stock" value="{{ $product->stock }}" class="border px-3 py-2" type="number">
        </div>
        <div class="mb-4">
            <label>Images (add more)</label>
            <input type="file" name="images[]" multiple>
        </div>
            <div class="mb-4">
                <label>Images</label>
                <div class="mb-2 flex space-x-2">
                    @foreach($product->images as $img)
                        <div class="relative">
                            <img src="{{ asset($img->path) }}" class="h-20 w-20 object-cover rounded">
                            <label class="absolute top-0 right-0 bg-white rounded-full p-1 text-xs">
                                <input type="checkbox" name="remove_images[]" value="{{ $img->id }}"> remove
                            </label>
                        </div>
                    @endforeach
                </div>
                <input type="file" name="images[]" multiple class="mt-1 block w-full image-input" data-preview-target="images-preview" />
                <div id="images-preview" class="mt-2 flex space-x-2"></div>
            </div>
        <div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
    <div class="mt-6">
        <h3 class="font-semibold">Existing Images</h3>
        <div class="flex space-x-3 mt-3">
            @foreach($product->images as $img)
                <img src="{{ asset($img->path) }}" class="h-24 w-24 object-cover rounded">
            @endforeach
        </div>
    </div>
</div>
@endsection
