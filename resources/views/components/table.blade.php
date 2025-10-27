@props([
    'headers' => [],
    'rows' => [],
    'searchPlaceholder' => 'Cari...',
    'addButtonText' => null,
    'addButtonUrl' => null,
    'showSearch' => true,
    'showFilters' => false,
    'filters' => [],
])

<div class="bg-white rounded-lg shadow">
    <style>
        /* Mobile-friendly table: hide header and stack cells */
        @media (max-width: 767px) {
            .mobile-table thead { display: none; }
            .mobile-table, .mobile-table tbody, .mobile-table tr, .mobile-table td { display: block; width: 100%; }
            .mobile-table tr { margin-bottom: 0.75rem; border-bottom: 1px solid #e5e7eb; padding-bottom: 0.5rem; }
            .mobile-table td { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 1rem; }
            .mobile-table td + td { margin-top: 0; }
            .mobile-table td .meta { color: #6b7280; font-size: 0.875rem; }
        }
    </style>
    <!-- Header with search and filters -->
    @if($showSearch || $showFilters || $addButtonText)
    <div class="p-4 border-b">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div class="flex-1 flex flex-col md:flex-row gap-3">
                @if($showSearch)
                <!-- Search Input -->
                <div class="relative flex-1 max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" 
                           placeholder="{{ $searchPlaceholder }}" 
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 text-sm">
                </div>
                @endif

                @if($showFilters && count($filters) > 0)
                <!-- Filter Dropdowns -->
                <div class="flex gap-2">
                    @foreach($filters as $filter)
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 bg-white text-sm">
                        <option>{{ $filter['label'] }}</option>
                        @foreach($filter['options'] as $option)
                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                        @endforeach
                    </select>
                    @endforeach
                
                </div>
                @endif
            </div>

            @if($addButtonText && $addButtonUrl)
            <!-- Add Button -->
            <a href="{{ $addButtonUrl }}" class="inline-flex items-center justify-center md:justify-start w-full md:w-auto px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition text-sm font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                {{ $addButtonText }}
            </a>
            @endif
        </div>
    </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full mobile-table">
            <thead class="bg-gray-50 border-b">
                <tr>
                    @foreach($headers as $header)
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $header }}
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
