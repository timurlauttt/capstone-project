@extends('farmer.layouts.app')
@section('title','Create Product')
@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-xl mb-6">Create Product</h1>
    <form action="{{ route('farmer.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block">Title</label>
            <input name="title" class="w-full border px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label>Price</label>
            <input name="price" class="border px-3 py-2">
        </div>
        <div class="mb-4">
            <label>Stock</label>
            <input name="stock" class="border px-3 py-2" type="number">
        </div>
        <div class="mb-4">
            <label>Images</label>
                <input type="file" name="images[]" multiple class="mt-1 block w-full image-input" data-preview-target="images-preview" />
                <div id="images-preview" class="mt-2 flex space-x-2"></div>
        </div>
        <div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
        </div>
    </form>
</div>
@endsection
