@extends('farmer.layouts.app')

@section('title', 'Inquiries')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Inquiries / Inbox</h1>
        <div class="flex items-center space-x-2">
            <a href="{{ route('farmer.inquiries.export') }}" class="bg-gray-200 px-3 py-2 rounded">Export CSV</a>
        </div>
    </div>

    @include('partials.flash')

    <div class="mb-4">
        <form method="GET" class="flex space-x-2">
            <select name="status" class="border px-2 py-1">
                <option value="">All</option>
                <option value="new">New</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
            <button class="bg-blue-600 text-white px-3 py-1 rounded">Filter</button>
        </form>
    </div>

    @if($inquiries->count())
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Product</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Contact</th>
                        <th class="px-4 py-2 text-left">Qty</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inquiries as $inq)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $inq->id }}</td>
                            <td class="px-4 py-2">{{ $inq->product?->title ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $inq->name }}</td>
                            <td class="px-4 py-2">{{ $inq->phone }} / {{ $inq->email }}</td>
                            <td class="px-4 py-2">{{ $inq->qty }}</td>
                            <td class="px-4 py-2">{{ ucfirst($inq->status) }}</td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('farmer.inquiries.show', $inq) }}" class="text-blue-600">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $inquiries->links() }}</div>
    @else
        <div class="bg-white rounded shadow p-6 text-center">No inquiries found.</div>
    @endif

@endsection
