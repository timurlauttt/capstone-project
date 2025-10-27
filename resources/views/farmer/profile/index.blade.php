@extends('farmer.layouts.app')
@section('title', 'Profil Saya')
@section('content')

<div class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Profil Saya</h1>
            <p class="text-gray-600 mt-1">Kelola informasi profil Anda</p>
        </div>

        <!-- Profile Information -->
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Informasi Pribadi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Nama Lengkap</p>
                    <p class="text-gray-900 font-medium">{{ $farmer->name }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Email</p>
                    <p class="text-gray-900 font-medium">{{ $farmer->email }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Nomor Telepon</p>
                    <p class="text-gray-900 font-medium">{{ $farmer->phone ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Alamat</p>
                    <p class="text-gray-900 font-medium">{{ $farmer->address ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection