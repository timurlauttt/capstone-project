@extends('farmer.layouts.app')
@section('title','Farmer Dashboard')
@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">Your Products</h1>
    <a href="{{ route('farmer.products.create') }}" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded">Add Product</a>
        <div class="mb-4">
            <a href="{{ route('farmer.products.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded">Create Product</a>
        </div>
    @include('farmer.products.partials.table')
</div>
@endsection
