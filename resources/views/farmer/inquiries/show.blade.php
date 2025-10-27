@extends('farmer.layouts.app')

@section('title', 'Inquiry #'.$inquiry->id)

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Inquiry #{{ $inquiry->id }}</h1>
        <div class="space-x-2">
            <a href="#" class="bg-yellow-500 text-white px-3 py-1 rounded">Convert to Order</a>
            <a href="{{ route('farmer.inquiries.index') }}" class="bg-gray-200 px-3 py-1 rounded">Back</a>
        </div>
    </div>

    
    <div class="bg-white rounded shadow p-4 mb-4">
        <h2 class="font-medium">Customer</h2>
        <p>{{ $inquiry->name }} — {{ $inquiry->phone }} / {{ $inquiry->email }}</p>
        <h2 class="font-medium mt-4">Product</h2>
        <p>{{ $inquiry->product?->title ?? 'Unknown product' }}</p>
        <h2 class="font-medium mt-4">Message</h2>
        <p class="whitespace-pre-wrap">{{ $inquiry->message }}</p>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white rounded shadow p-4">
            <h3 class="font-medium mb-2">Update Status</h3>
            <form method="POST" action="{{ route('farmer.inquiries.status', $inquiry) }}">
                @csrf
                @method('PATCH')
                <select name="status" class="border px-2 py-1 mb-2">
                    <option value="new" {{ $inquiry->status=='new'?'selected':'' }}>New</option>
                    <option value="open" {{ $inquiry->status=='open'?'selected':'' }}>Open</option>
                    <option value="closed" {{ $inquiry->status=='closed'?'selected':'' }}>Closed</option>
                </select>
                <div><button class="bg-blue-600 text-white px-3 py-1 rounded">Update</button></div>
            </form>
        </div>

        <div class="bg-white rounded shadow p-4">
            <h3 class="font-medium mb-2">Reply / Note</h3>
            <form method="POST" action="{{ route('farmer.inquiries.reply', $inquiry) }}">
                @csrf
                <textarea name="message" class="w-full border p-2" rows="4"></textarea>
                <div class="mt-2 text-right"><button class="bg-green-600 text-white px-3 py-1 rounded">Send Reply (log)</button></div>
            </form>
        </div>
    </div>

@endsection
