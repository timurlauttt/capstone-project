@if(session('success') || session('error'))
    <div class="flash-message fixed top-4 right-4 bg-white border p-4 rounded shadow transition-opacity">
        @if(session('success'))
            <div class="text-green-700">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="text-red-700">{{ session('error') }}</div>
        @endif
    </div>
@endif
